<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Services\CardService;

class CardController extends Controller
{
    protected $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $cards = Card::orderBy('id','DESC')->paginate(15);
        return view('card.index',compact('cards'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $select =  $this->cardService->getSelectCompany(); 
        return view('card.create',compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    { 
        if(!$request->hasFile('image')) 
        return redirect()->back()
        ->with('error', 'not found image !');

        $request =  $this->cardService->uploadImage($request); 
        Card::create($request);
        
        return redirect()->back()
        ->with('success', 'Card was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    { 
        return view('card.show',compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        
       $select =  $this->cardService->getSelectCompany(); 
        return view('card.edit',compact('card','select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Card $card)
    {
        if($request->hasFile('image'))  {
            $request =  $this->cardService->uploadImage($request); 
        }
        else{
            $request =  $request->all();
        } 

        $card->update($request);
        
        return redirect()->back()
        ->with('success', 'Card was created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->back()
        ->with('success', 'success deleted !');
    }
}
