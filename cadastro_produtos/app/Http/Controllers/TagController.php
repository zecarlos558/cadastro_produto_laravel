<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use PDF;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag.indexTag', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.createTag')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $request->validated();

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('indexTag')->with('msg_alert','Tag salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        $produtos = $tag->products;

        return view('tag.showTag', ['tag' => $tag, 'produtos' => $produtos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tag.editTag',['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $request->validated();

        $data = $request->all();
        Tag::findOrFail($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();

        return redirect()->route('indexTag')->with('msg_alert','Tag deletado com sucesso!');
    }

    public function relatorio()
    {
        $relatorioAnaliticos = Tag::relatorioAnalitico()->get();
        $relatorioSinteticos = Tag::relatorioSintetico()->get();

        return view('relatorio.indexRelatorio',['relatorioAnaliticos' => $relatorioAnaliticos,
                                                'relatorioSinteticos' => $relatorioSinteticos]);
    }

    // Generate PDF
    public function geraPDF() {
        // retreive all records from db
        $relatorioAnaliticos = Tag::relatorioAnalitico()->get();
        $relatorioSinteticos = Tag::relatorioSintetico()->get();
        // share data to view
        //view()->share('relatorio.pdfRelatorio',compact('relatorioAnaliticos','relatorioSinteticos'));
        //$pdf = PDF::loadView('relatorio.pdfRelatorio',compact('relatorioAnaliticos','relatorioSinteticos'));
        //$pdf = PDF::loadView('relatorio.pdfRelatorio',$relatorioAnaliticos,$relatorioSinteticos);

        //return $pdf->setPaper('a4')->stream('Relatorio.pdf');
        // download PDF file with download method
        //return $pdf->download('pdf_file.pdf');

        return view('relatorio.pdfRelatorio',['relatorioAnaliticos' => $relatorioAnaliticos,
                                               'relatorioSinteticos' => $relatorioSinteticos]);
      }

      // Generate PDF
    public function geraSQL() {
        // retreive all records from db
        $relatorioAnaliticos = Tag::relatorioAnalitico()->toSql();
        $relatorioSinteticos = Tag::relatorioSintetico()->toSql();
        // share data to view
        //view()->share('relatorio.pdfRelatorio',compact('relatorioAnaliticos','relatorioSinteticos'));
        //$pdf = PDF::loadView('relatorio.pdfRelatorio',compact('relatorioAnaliticos','relatorioSinteticos'));
        //$pdf = PDF::loadView('relatorio.pdfRelatorio',$relatorioAnaliticos,$relatorioSinteticos);

        //return $pdf->setPaper('a4')->stream('Relatorio.pdf');
        // download PDF file with download method
        //return $pdf->download('pdf_file.pdf');

        return view('relatorio.sqlRelatorio',['relatorioAnaliticos' => $relatorioAnaliticos,
                                                'relatorioSinteticos' => $relatorioSinteticos]);
      }

}
