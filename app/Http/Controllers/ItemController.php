<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','search']);
    }

    public function index()
    {
        $items = Item::latest()->paginate(10);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:lost,found',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'date_reported' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:5120',
            'reporter_name' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('items', 'public');
            $data['photo_path'] = $path;
        }

        $data['user_id'] = Auth::id();
        $item = Item::create($data);

        return redirect()->route('items.show', $item)->with('success', 'Report submitted.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $this->authorize('update', $item);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $this->authorize('update', $item);

        $data = $request->validate([
            'type' => 'required|in:lost,found',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'date_reported' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:5120',
            'status' => 'nullable|in:open,claimed,closed',
            'reporter_name' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($item->photo_path) {
                Storage::disk('public')->delete($item->photo_path);
            }
            $path = $request->file('photo')->store('items', 'public');
            $data['photo_path'] = $path;
        }

        $item->update($data);

        return redirect()->route('items.show', $item)->with('success', 'Report updated.');
    }

    public function destroy(Item $item)
    {
        $this->authorize('delete', $item);

        if ($item->photo_path) {
            Storage::disk('public')->delete($item->photo_path);
        }
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Report deleted.');
    }

    public function search(Request $request)
    {
        $q = $request->get('q', '');
        $items = Item::where('name', 'like', "%{$q}%")
            ->orWhere('description', 'like', "%{$q}%")
            ->orWhere('location', 'like', "%{$q}%")
            ->paginate(12)->withQueryString();

        return view('items.index', compact('items', 'q'));
    }

    public function potentialMatches(Item $item)
    {
        $matches = Item::where('type', $item->type === 'lost' ? 'found' : 'lost')
            ->where(function ($query) use ($item) {
                if ($item->name) {
                    $query->where('name', 'like', "%{$item->name}%");
                }
                $query->orWhere('description', 'like', "%{$item->description}%");
            })
            ->get();

        return view('items.matches', compact('item', 'matches'));
    }
}