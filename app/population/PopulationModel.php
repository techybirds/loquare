<?php

namespace App\population;

use Illuminate\Database\Eloquent\Model;

class PopulationModel extends Model
{
	protected $table = "population";

	protected $fillable = array(
		'ccaa', 'prov', 'muni', 'dist', 'sec', 'cuces', 'cops', 'latitude', 'longitude', 'x', 'y', 'Shape_areakm2', 'nombre', 'provincia',
		'comunidad_aut_noma', 'censo_ine', 'idensitat', 'cluster', 'lyfestyle', 'F_NivelEconomico', 'F_TamanoHogar', 'F_IndiceSolteria', 'F_NivelEstudios',
		'F_FactorInmig', 'F_IndiceEdad', 'F_Densidad', 'psolteros', 'pnacional', 'psexof', 'pvivacias', 'pedad10', 'pedad40', 'pedad75', 'medad'
	);

}
