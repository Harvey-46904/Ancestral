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

    public function api_data($nombre_comunidad){
        
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
 
    $arbol = $this->buildHierarchy($consulta[0]->personas);
    $arbol = json_encode($arbol);
    $jsonString = json_encode($arbol);
    $consulta[0]->personas=$arbol;
    $urlImagenlogo = asset('storage/' . $consulta[0]->logo);
    $consulta[0]->logo=$urlImagenlogo;
    $urlImagen = asset('storage/' . $consulta[0]->Fotografia);
    $consulta[0]->Fotografia=$urlImagen;

       
       return response($consulta);
        return response(["DAT"=>$consulta[0]->personas]);
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

    public function buildHierarchy($personas) {
        // Convertir las personas de stdClass a array asociativo si es necesario
        $personas = array_map(function ($persona) {
            return (array) $persona;
        }, $personas);
    
        // Indexar personas por su ID
        $indexed_personas = collect($personas)->keyBy('id')->toArray();
    
        // Array para almacenar los nodos y enlaces
        $nodes = [];
        $links = [];
    
        // Función recursiva para construir el árbol
        $buildTree = function ($persona) use (&$buildTree, &$indexed_personas, &$nodes, &$links) {
            // Crear nodo para la persona
            $node = [
                'id' => 'node_' . $persona['id'],
                'name' => $persona['nombre_persona'],
                'info' => [
                    'id' => $persona['id'],
                    'nombre_persona' => $persona['nombre_persona'],
                    'descripcion_persona' => $persona['descripcion_persona'],
                    'fotografia' => asset('storage/' . str_replace('\\', '/', $persona['fotografia'])), // Ajustar la ruta de la fotografía
                    'linaje_id' => $persona['linaje_id'],
                    'padre_id' => $persona['padre_id'],
                    'created_at' => $persona['created_at'],
                    'updated_at' => $persona['updated_at'],
                    'nacimiento' => $persona['nacimiento'],
                    'difuncion' => $persona['difuncion'],
                    'memoria' => $persona['memoria']
                ]
            ];
    
            // Agregar el nodo al array de nodes
            $nodes[] = $node;
    
            // Buscar hijos de la persona actual
            $hijos = array_filter($indexed_personas, function ($p) use ($persona) {
                return $p['padre_id'] == $persona['id'];
            });
    
            // Verificar si la persona tiene hijos y procesar recursivamente
            foreach ($hijos as $hijo) {
                // Añadir enlace al array de links
                $link = [
                    'source' => 'node_' . $persona['id'],
                    'target' => 'node_' . $hijo['id']
                ];
                $links[] = $link;
    
                // Llamar recursivamente para cada hijo
                $buildTree($hijo);
            }
        };
    
        // Construir el árbol comenzando desde las personas que no tienen padre (padre_id = 0)
        foreach ($personas as $persona) {
            if ($persona['padre_id'] == 0) {
                $buildTree($persona);
            }
        }
    
        // Retornar la estructura final de nodes y links
        return [
            'nodes' => $nodes,
            'links' => $links
        ];
    }
    
}
