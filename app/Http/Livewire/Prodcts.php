<?php

namespace App\Http\Livewire;
use App\Models\products;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Prodcts extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $q;
    public $product;
    public $image;
    public $confirmProductDeletion = false;
    public $confirmProductAdd = false;
    
    protected $queryString = [
        'q'=>['except'=>''],
        
    ];
    public function render()
    { 
        $products = products::when($this->q, function($query){
            return $query->where(function($query){
                $query->where('name','like','%'.$this->q.'%')
                    ->orWhere('price','like','%'.$this->q.'%');
            });
        })->paginate(5);
        return view('livewire.prodcts', ['products' => $products]);
    }
    public function updatingq()
    {
        $this->resetPage();
    }
    public function confirmProductDeletion($id)
    {
       $this->confirmProductDeletion = $id;
    }
    public function deleteproduct(products $products)
    {
        $products->delete();
        $this->confirmProductDeletion = false;
        session()->flash('message','Product Deleted Successfully');
    }
    public function confirmProductAdd()
    {
        $this->reset(['product','image']); // Reset only the product property
        $this->confirmProductAdd = true;
    }
    public function confirmProductUpdate( products $product)
    { 

        $this->product = $product->toArray();
        $this->image = $product->image; 
        
        $this->confirmProductAdd = true;

    }
    public function saveproduct()
    {
        $productRules = [
            'product.name' => 'required|string|min:4',
            'product.quantity' => 'required|string|between:1,1000',
            'product.price' => 'required|numeric|between:1,1000000',
            'product.category' => 'required',
        ];
        $imageRules = [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:102400',
        ];

        $imagePath = '';

        if ($this->image instanceof \Illuminate\Http\UploadedFile) {
            $imagePath = $this->image->store('products', 'public');
        } elseif (is_string($this->image)) {
            // Image is already a path, no need to change it
            $imagePath = $this->image;
        }

        $data = [
            'name' => $this->product['name'],
            'quantity' => $this->product['quantity'],
            'price' => $this->product['price'],
            'category' => $this->product['category'],
        ];

        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }

        if (isset($this->product['id'])) {
            // Update an existing product
            products::where('id', $this->product['id'])->update($data);
            session()->flash('message', 'Product Updated Successfully');
        } else {
            // Create a new product
            products::create($data);
            session()->flash('message', 'Product Added Successfully');
        }

        $this->confirmProductAdd = false;
    }


} 