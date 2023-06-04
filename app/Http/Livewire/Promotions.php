<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Promotion;
use Livewire\WithPagination;

class Promotions extends Component
{ 
    use WithPagination;
    public $q;
    public $promotion;

    public $confirmPromoDeletion = false;
    public $confirmPromoAdd = false;

    protected $rules = [
        'promotion.Bname'=>'required|string|min:4',
        'promotion.Percentage'=>'required|numeric|between:1,100',
        'promotion.EndMonth'=>'required|string|min:3|max:20',       
    ];
    
    protected $queryString = [
        'q'=>['except'=>''],
        
    ];

    public function render()
    {
        $promotions = Promotion::when($this->q,function($query){
            return $query->where(function($query){
                $query->where('Bname','like','%'.$this->q.'%')
                    ->orWhere('Percentage','like','%'.$this->q.'%');
            });
        })->paginate(5);
        return view('livewire.promotions', ['promotions' => $promotions]);
    }
    public function updatingq()
    {
        $this->resetPage();
    }
    public function confirmPromoDeletion($id)
    {
       // $product->delete();
       $this->confirmPromoDeletion = $id;
      

    }
    public function deletepromotion(Promotion $promotion)
    {
        $promotion->delete();
        $this->confirmPromoDeletion = false;
        session()->flash('message','Promotion Deleted Successfully');
    }
    public function confirmPromoAdd()
    {
       // $product->delete();
         $this->reset(['promotion']);
       $this->confirmPromoAdd = true;

    }
    public function confirmPromoUpdate(Promotion $promotion)
    {
        $this->promotion = $promotion;
        $this->confirmPromoAdd = true;
    }
    public function savepromo()
    {
        $this->validate();
        if(isset($this->promotion->id))
        {
            $this->promotion->save();
            session()->flash('message','Promotion Updated Successfully');
        }
        else
        {
            promotion::create([
                'Bname'=>$this->promotion['Bname'],
                'Percentage'=>$this->promotion['Percentage'],
                'EndMonth'=>$this->promotion['EndMonth'],
            ]);	
            session()->flash('message','Promotion Added Successfully');
        }
        
        $this->confirmPromoAdd = false;
    }
    
}

