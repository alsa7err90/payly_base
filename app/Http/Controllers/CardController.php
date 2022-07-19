<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Services\CardService;
use App\Http\Controllers\BaseController as BaseController;

class CardController extends BaseController
{
    // index 
    // create
    // store
    // show
    // edit
    // update
    // destroy
 
    protected $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }  


    public function index(Request $request)
    { 
        $cards = Card::orderBy('id','DESC')->paginate(15);
        return view('card.index',compact('cards'))
            ->with('i', ($request->input('page', 1) - 1) * 5); 
    }
 
    public function create()
    { 
         return view('card.create');
    }
 
    public function store(CardRequest $request)
    { 
        if(!$request->hasFile('image'))  return $this->redirectBackError("not found image !");
        $request =  $this->cardService->uploadImage($request); 
        $request =  $this->cardService->createCard($request);
        
       return $this->redirectBackSuccess("success store");
    }
 
    public function show(Card $card)
    { 
        return view('card.show',compact('card'));
    }
 
    public function edit(Card $card)
    { 
        return view('card.edit',compact('card'));
    }
 
    public function update(CardRequest $request, Card $card)
    {
        if($request->hasFile('image'))  {
            $request =  $this->cardService->uploadImage($request); 
        }
        else{
            $request =  $request->all();
        } 

        $card->update($request);
        
       return $this->redirectBackSuccess("success update"); 
    }
 
    public function destroy(Card $card)
    {
        $card->delete();
        return $this->redirectBackSuccess("success deleted !");  
    }
}
