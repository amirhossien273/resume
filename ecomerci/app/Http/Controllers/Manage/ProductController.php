<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Product\StoreProductRequest;
use App\Http\Requests\Manage\Product\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Tag;
use App\Service\Media\MediaService;
use App\Traits\FarsiSlug;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Module\Media\Src\MediaUploader;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductController extends Controller
{
    use FarsiSlug;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->has('search') && $request->search != '') {
            $products = $products->where('title', 'like', '%' . $request->search . '%');
        }
        $products = $products->paginate(15);
        return view('manage.page.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::with('attributeOptions')->get();
        $tags = Tag::get();
        return view('manage.page.products.create', compact('categories', 'attributes', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $slug = $request->get('slug') ?: $this->createFarsiSlug($request->get('title'));

        $product = new Product([
            'title'       => $request->get('title'),
            'slug'        => $slug,
            'content'     => $request->get('content'),
            'intro'       => $request->get('intro'),
            'state_enum'  => 'PENDING',
            'creator_id'  => auth()->id(),
            'show_order'  => $request->get('show_order'),
            'category_id' => $request->get('category_id'),
        ]);

        $product->save();

        if ($request->has('attribute_ids')) {
            $product->attributeOptions()->sync($request->input('attribute_ids'));
        }

        if ($request->hasFile('gallery')) {
            $media_ids = [];
            foreach($request->file('gallery') as $index => $file) {
                $media = MediaUploader::source($file)
                    ->useName($product->title)
                    ->useFileName(now()->timestamp)
                    ->usePatch('product')
                    ->useCollection('product')
                    ->upload();

                $media_ids[] .= $media->id;
                $product->media()->attach($media->id, ["channel" => 'product']);
            }
        }

        return redirect()->route('manage.products.index')->with('success',  __('messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('manage.page.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $attributes = Attribute::with('attributeOptions')->get();
        $tags = Tag::get();
        $product->load(['media' => function ($query) {
            $query->orderBy('order');
        }]);
        return view('manage.page.products.edit', compact('product', 'categories', 'attributes', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $slug = $request->get('slug') ? $this->createFarsiSlug($request->get('slug')) : $this->createFarsiSlug($request->get('title'));

        $product->update([
            'title'       => $request->get('title'),
            'slug'        => $slug,
            'content'     => $request->get('content'),
            'intro'       => $request->get('intro'),
            'state_enum'  => $request->get('state_enum'),
            'show_order'  => $request->get('show_order'),
            'category_id' => $request->get('category_id'),
        ]);

        if ($request->has('attribute_ids')) {
            $product->attributeOptions()->sync($request->input('attribute_ids'));
        }

        if ($request->has('tag_ids')) {
            $product->tags()->sync($request->input('tag_ids'));
        }

        if ($request->hasFile('gallery')) {

            $media_ids = [];
            foreach($request->file('gallery') as $file) {
                $media = MediaUploader::source($file)
                ->useName($product->title)
                ->useFileName(now()->timestamp)
                ->usePatch('product')
                ->useCollection('product')
                ->upload();

                $media_ids[] .= $media->id;
            }

            $product->media()->attach($media_ids, ["channel" => 'product']);
        }

        return redirect()->route('manage.products.index')->with('success',  __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('manage.products.index')->with('success', __('messages.deleted'));
    }

    public function toggleActive(Product $product)
    {
        $product->is_active = !$product->is_active;
        $product->save();

        return redirect()->route('manage.products.index')->with('success',  __('messages.status'));
    }

    public function toggleShowFirstPage(Product $product)
    {
        $product->is_show_first_page = !$product->is_show_first_page;
        $product->save();

        return redirect()->route('manage.products.index')->with('success',  __('messages.status'));
    }

    public function excelPage()
    {
        return view('manage.page.products.execl');
    }

    public function getExcele()
    {
        $products = ProductItem::query()
        ->with('product', 'variationOptions')->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ای دی');
        $sheet->setCellValue('B1', 'نام محصول');
        $sheet->setCellValue('C1', 'ویژگی');
        $sheet->setCellValue('D1', 'قیمت');
        $sheet->setCellValue('E1', 'قینت خط خورده');

        foreach($products as $key=> $product){
            $sheet->setCellValue('A' . $key + 2, $product->id);
            $productTitle = $product->product ? $product->product->title : 'بدون محصول';
            $sheet->setCellValue('B' . $key + 2, $productTitle);
            $variationTitle = $product->variationOptions->isNotEmpty() ? $product->variationOptions[0]->title : 'بدون ویژگی';
            $sheet->setCellValue('C' . $key + 2, $variationTitle);
            $sheet->setCellValue('D' . $key + 2, $product->price);
            $sheet->setCellValue('E' . $key + 2, $product->strikethrough_price);
        }

        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $fileName = "products_{$timestamp}.xlsx";

        $filePath = storage_path($fileName);

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return Response::download($filePath)->deleteFileAfterSend(true);
    }

    public function chngePrice(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0) continue;

            $id = $row[0];
            $price = is_numeric($row[3]) ? $row[3] : null;
            $strikethroughPrice = isset($row[4]) && is_numeric($row[4]) ? $row[4] : null;

            $product = ProductItem::find($id);
            if ($product) {
                $product->price = $price;
                $product->strikethrough_price = $strikethroughPrice;
                $product->save();
            }
        }

        return back()->with('success', 'قیمت‌ها با موفقیت بروزرسانی شدند.');

    }

    public function removeImage(Request $request, Product $product)
    {
        $request->validate([
            'media_id' => 'required|exists:media,id',
        ]);

        $product->media()->detach($request->media_id);

        return response()->json(['success' => true]);
    }

    public function reorderImages(Request $request, Product $product)
    {
        $request->validate([
            'media_ids' => 'required|array',
            'media_ids.*' => 'exists:media,id',
        ]);

        foreach ($request->media_ids as $index => $mediaId) {
            $media = Media::find($mediaId);
            $media->order = $index + 1;
            $media->save();
        }

        return response()->json(['success' => true]);
    }
}
