<?php

namespace App\Http\Controllers;

use App\Models\Comunidades;
use Illuminate\Http\Request;
use DB;
class ComunidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nombre_comunidad)
    {

        $consulta = DB::table("linajes")
        ->join("comunidades", "comunidades.id", "=", "linajes.comunidad_id")
        ->leftJoin("personas", "personas.linaje_id", "=", "linajes.id")
        ->select(
            "comunidades.Nombre",
            "comunidades.Descripcion",
            "comunidades.Fotografia",
            "linajes.descripcion",
            "linajes.logo",
            "linajes.id as linaje_id",
            "linajes.nombre",
           
            DB::raw("GROUP_CONCAT(personas.nombre_persona SEPARATOR ', ') as personas")
        )
        ->where("linajes.nombre", "=", $nombre_comunidad)
        ->groupBy("linajes.id", "linajes.nombre","comunidades.Nombre", "comunidades.Descripcion",
        "linajes.descripcion", "comunidades.Fotografia", "linajes.logo")
        ->get();
    
    // Convertimos el resultado en un array para unirlo con personas
    $consulta = $consulta->toArray();
    
    // Ahora obtenemos todas las personas asociadas a cada linaje y las agregamos al array $consulta
    foreach ($consulta as &$item) {
        $personas = DB::table("personas")
            ->where("linaje_id", "=", $item->linaje_id)
            ->get();
        
        $item->personas = $personas->toArray();
    }
    
    $consulta[0]->personas=self::jerarquizar($consulta[0]->personas,$consulta[0]->nombre);
    $urlImagenlogo = asset('storage/' . $consulta[0]->logo);
    $consulta[0]->logo=$urlImagenlogo;
    $urlImagen = asset('storage/' . $consulta[0]->Fotografia);
    $consulta[0]->Fotografia=$urlImagen;

       
        return view("Inicio",compact("consulta"));
        return response(["DAT"=>$consulta[0]->personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidades $comunidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidades $comunidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunidades $comunidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidades $comunidades)
    {
        //
    }


    public function jerarquizar($personas,$nombre){
                // Paso 1: Indexar personas por su ID
        $indexed_personas = [];
        foreach ($personas as $persona) {
            $indexed_personas[$persona->id] = $persona;
        }

        // Paso 2: Construir el árbol jerárquico
        $jerarquia_personas = [];
        foreach ($indexed_personas as $persona) {
            // Si tiene un padre_id, lo añadimos como hijo de ese padre
            if ($persona->padre_id != 0 && isset($indexed_personas[$persona->padre_id])) {
                $padre_id = $persona->padre_id;
                if (!isset($indexed_personas[$padre_id]->hijos)) {
                    $indexed_personas[$padre_id]->hijos = [];
                }
                $indexed_personas[$padre_id]->hijos[] = $persona;
            } else {
                // Si no tiene padre_id válido, lo agregamos como raíz del árbol jerárquico
                $jerarquia_personas[] = $persona;
            }
        }

        $treeData = [
            "name" => $nombre,  // Puedes cambiar "Raíz" por el nombre que desees para el nodo raíz
            "children" => []
        ];

                // Agregar cada nodo principal (persona sin padre_id válido) al árbol
        foreach ($jerarquia_personas as $persona) {
            $treeData["children"][] = $this->personaToTreeNode($persona);
        }

        // Convertir $treeData a JSON para que coincida con el formato que necesitas
        $treeData = json_encode($treeData);
        return $treeData;
    }

    private function personaToTreeNode($persona) {
        $persona->fotografia=asset('storage/' .  $persona->fotografia);
        $node = [
            "name" => $persona->nombre_persona,
            "informacion"=>$persona
            // Agregar otras propiedades que desees incluir
        ];
    
        // Si la persona tiene hijos, convertir cada hijo en un nodo recursivamente
        if (isset($persona->hijos) && !empty($persona->hijos)) {
            $node["children"] = [];
            foreach ($persona->hijos as $hijo) {
                $node["children"][] = $this->personaToTreeNode($hijo);
            }
        }
    
        return $node;
    }
}
