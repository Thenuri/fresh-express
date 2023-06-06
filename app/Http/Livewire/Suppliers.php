<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class Suppliers extends Component
{
    use WithPagination;
    public $q;
    public $supplier;

    public $confirmSupplierDeletion = false;
    public $confirmSupplierAdd = false;

    protected $rules = [
        'supplier.Sname'=>'required|string|min:2',
        'supplier.Saddress'=>'required|string|min:3',
        'supplier.Sphone'=>'required|string|max:10',  
        'supplier.Semail'=>'required|string|min:3|max:40',
        'supplier.Product'=>'required|string|min:3|max:20',
    ];
    
    protected $queryString = [
        'q'=>['except'=>''],
        
    ];

    public function render()
    {
        $suppliers = Supplier::when($this->q,function($query){
            return $query->where(function($query){
                $query->where('Sname','like','%'.$this->q.'%')
                    ->orWhere('Product','like','%'.$this->q.'%');
            });
        })->paginate(5);
        return view('livewire.suppliers', ['suppliers' => $suppliers]);
    }
    public function updatingq()
    {
        $this->resetPage();
    }
    public function confirmSupplierDeletion($id)
    {
       // $product->delete();
       $this->confirmSupplierDeletion = $id;
      

    }
    public function deletesupplier(Supplier $supplier)
    {
        $supplier->delete();
        $this->confirmSupplierDeletion = false;
        session()->flash('message','Supplier Deleted Successfully');
    }
    public function confirmSupplierAdd()
    {
       // $product->delete();
         $this->reset(['supplier']);
       $this->confirmSupplierAdd = true;

    }
    public function confirmSupplierUpdate(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->confirmSupplierAdd = true;
    }
    
    public function savesupplier()
    {
        $this->validate();
        if(isset($this->supplier->id))
        {
            $this->supplier->save();
            session()->flash('message','Supplier Updated Successfully');
        }
        else
        {
            supplier::create([
                'Sname'=>$this->supplier['Sname'],
                'Saddress'=>$this->supplier['Saddress'],
                'Sphone'=>$this->supplier['Sphone'],
                'Semail'=>$this->supplier['Semail'],
                'Product'=>$this->supplier['Product'],
            ]);	
            session()->flash('message','Supplier Added Successfully');
        }
        
        $this->confirmSupplierAdd = false;
    }
}
