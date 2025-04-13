<?php
namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\ProductModel;
use App\Models\AdsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->get();
        return view('ads.index', compact('ads'));
    }

    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }
   public function preview($slug)
    {
        $ad = Ad::where('slug', $slug)->firstOrFail();
        $relatedAds = Ad::with('adimages')
        // ->where('subcategory_id', $ad->subcategory_id)
        ->where('id', '!=', $ad->id)
        ->latest()
        ->take(4)
        ->get();
        return view('ads.preview', compact('ad','relatedAds'));
    }
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $models = ProductModel::all();

        return view('ads.create', compact('categories', 'subcategories', 'brands', 'models'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'price' => 'required|numeric',
            'property_images.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'product_condition' => 'required|in:new,used',
            'warranty' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $validated['slug'] = Str::slug($request->name . '-' . uniqid());

            $ad = Ad::create($validated);

            if ($request->hasFile('property_images')) {
                foreach ($request->file('property_images') as $image) {
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('adsImages'), $fileName);

                    AdsImage::create([
                        'ad_id' => $ad->id,
                        'image_path' => 'adsImages/' . $fileName,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('ads.index')->with('success', 'Ad created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to create ad: ' . $e->getMessage()]);
        }
    }

   

    public function edit($slug)
    {
        $ad = Ad::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $models = ProductModel::all();
        $images = $ad->images;

        return view('ads.edit', compact('ad', 'categories', 'subcategories', 'brands', 'models', 'images'));
    }

    public function update(Request $request, $slug)
    {
        $ad = Ad::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'name' => 'sometimes|string|max:255',
            'product_description' => 'nullable|string',
            'price' => 'sometimes|numeric',
            'property_images.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'in:active,inactive',
            'category_id' => 'sometimes|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'brand_id' => 'sometimes|exists:brands,id',
            'model_id' => 'sometimes|exists:product_models,id',
            'product_condition' => 'sometimes|in:new,used',
            'warranty' => 'sometimes|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $ad->update($validated);

            if ($request->hasFile('property_images')) {
                foreach ($request->file('property_images') as $image) {
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('adsImages'), $fileName);

                    AdsImage::create([
                        'ad_id' => $ad->id,
                        'image_path' => 'adsImages/' . $fileName,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('ads.index')->with('success', 'Ad updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to update ad: ' . $e->getMessage()]);
        }
    }

    public function destroy($slug)
    {
        $ad = Ad::where('slug', $slug)->firstOrFail();

        DB::beginTransaction();

        try {
            foreach ($ad->images as $image) {
                $imagePath = public_path($image->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            $ad->delete();
            DB::commit();

            return redirect()->route('ads.index')->with('success', 'Ad deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to delete ad: ' . $e->getMessage()]);
        }
    }
}


