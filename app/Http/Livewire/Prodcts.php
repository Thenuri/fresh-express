<?php

namespace App\Http\Livewire;
use App\Models\products;
use Livewire\Component;
use Livewire\WithPagination;

class Prodcts extends Component
{
    use WithPagination;
    public $q;
    public $product;
    public $confirmProductDeletion = false;
    public $confirmProductAdd = false;

    protected $rules = [
        'product.name'=>'required|string|min:4',
        'product.quantity'=>'required|numeric|between:1,1000',
        'product.price'=>'required|numeric|between:1,100',       
    ];
    
    
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
       // $product->delete();
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
       // $product->delete();
         $this->reset(['product']);
       $this->confirmProductAdd = true;

    }
    public function confirmProductUpdate(products $products)
    {
        $this->product = $products;
        $this->confirmProductAdd = true;
    }
    public function saveproduct()
    {
        $this->validate();
        if(isset($this->product->id))
        {
            $this->product->save();
            session()->flash('message','Product Updated Successfully');
        }
        else
        {
            products::create([
                'name'=>$this->product['name'],
                'quantity'=>$this->product['quantity'],
                'price'=>$this->product['price'],
            ]);	
            session()->flash('message','Product Added Successfully');
        }
        
        $this->confirmProductAdd = false;
    }

    
}