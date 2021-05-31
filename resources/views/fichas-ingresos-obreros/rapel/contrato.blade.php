@extends('pdf-layout')

@section('titulo')
    FICHA PERSONAL contrato declaracion topico - {{ $contrato->oficio->name }}
@endsection

<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    .contrato {
        font-size: 11px;
    }

    p, li {
        text-align: justify;
    }

    .contrato li {
        margin: 0 0 13px 0;
    }

    .titulo {
        text-align: center;
        text-decoration: underline;
    }

    .page-break {
        page-break-after: always;
    }

    .lista-romanos {
        list-style: upper-roman
    }

    .lista-sin-estilos {
        list-style: none;
    }

    table {
        border-collapse: collapse;
    }
    .tabla th, .tabla td {
        border: 1px solid black;
    }

    td {
        padding: 5px;
    }

    .firma-container {
        margin-top: 80px;
    }

    .firma-container div {
        display: inline;
    }

    .firma-container .primero {
        margin-left: 80px;
    }

    .firma-container .segundo {
        padding-left: 200px;
    }

    .espacios-lista li {
        margin-bottom: 2px;
    }

    .espacios-lista-md li {
        margin-bottom: 10px;
    }
</style>

@section('contenido')

    <section id="page23">
        <h5 style="text-align: center">
            Ficha de Sintomatología COVID-19 para Regreso al Trabajo<br/>
            Declaración Jurada
        </h5>
        <div style="font-size: 11px; text-align: justify">
            <p>He recibido explicación del objetivo de esta evaluación y me comprometo a responder con la verdad </p>
            <p style="font-weight: bold">
                Empresa: SOCIEDAD AGRÍCOL RAPEL S.A.C &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RUC: 20451779711 <br /><br />
                Apellidos y Nombres: {{ $trabajador->nombre_completo }}<br /><br />
                Área de Trabajo: ___________________________ &nbsp;&nbsp;DNI: {{ $trabajador->rut }}<br /><br/>
                Dirección: <span style="font-weight: normal">{{ $trabajador->direccion }}</span> &nbsp;&nbsp;Numero (celular): _____________
            </p>
            <div>
                <p style="font-weight: bold">En los últimos 14 días calendario ha tenido algunos de los síntomas siguientes</p>
                <table>
                    <tr>
                        <th></th>
                        <th>SI</th>
                        <th>NO</th>
                    </tr>
                    <tr>
                        <td>1. sensación de alza térmica o fiebre</td>
                        <td style="border: 1px solid black">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td style="border: 1px solid black">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>2. tos, estornudos o flema o dificultad para respirar</td>
                        <td style="border: 1px solid black"></td>
                        <td style="border: 1px solid black"></td>
                    </tr>
                    <tr>
                        <td>3. expectoración de flema amarilla o verdosa</td>
                        <td style="border: 1px solid black"></td>
                        <td style="border: 1px solid black"></td>
                    </tr>
                    <tr>
                        <td>4. contacto con persona(s) con un caso confirmado de COVID-19</td>
                        <td style="border: 1px solid black"></td>
                        <td style="border: 1px solid black"></td>
                    </tr>
                    <tr>
                        <td>5. Estas tomando alguna medicación (detallar cual o cuales):</td>
                        <td style="border: 1px solid black"></td>
                        <td style="border: 1px solid black"></td>
                    </tr>
                </table>
                <p>
                    Todos los datos expresados en esta ficha constituyen declaración jurada de mi parte<br /><br />
                    He sido informado que de omitir o falsear información puedo perjudicar la salud de mis compañeros, y la mía propia, lo cual de constituir una falta grave a la salud pública, asumo sus consecuencias
                </p>
            </div>
            <div>
                <p style="font-weight: bold;">Fecha: {{ $contrato->fecha_larga }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma: ___________________</p>
                <p>Por favor lea detenidamente y marque con una X en el cajón correspondiente si tuvo la condición:</p>
                <table>
                    <tr>
                        <td style="border: 1px solid black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Dolor de cabeza crónico</td>
                        <td style="border: 1px solid black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Neumonía recurrente</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedades del cerebro</td>
                        <td style="border: 1px solid black"></td>
                        <td>Bronquitis crónica</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Desordenes del sistema nervioso central</td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfisema</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Epilepsia (convulsiones)</td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedad pleural</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Parálisis o parecías (parálisis parcial</td>
                        <td style="border: 1px solid black"></td>
                        <td>Tos con rasgos de sangre o sangrado al toser (hemoptisis)</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Mareos y/o vértigo</td>
                        <td style="border: 1px solid black"></td>
                        <td>Resfríos recurrentes (más de 1 ves a la semana)</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Sincope o desmayo</td>
                        <td style="border: 1px solid black"></td>
                        <td>Dolor de oído</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Pérdida de conciencia</td>
                        <td style="border: 1px solid black"></td>
                        <td>sangrado por algún oído</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Depresión</td>
                        <td style="border: 1px solid black"></td>
                        <td>supuración (salida de material purulento) por el oído</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Ansiedad</td>
                        <td style="border: 1px solid black"></td>
                        <td>zumbido de oídos</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Transtorno bipolar (maniaco-depresivo)</td>
                        <td style="border: 1px solid black"></td>
                        <td>Disminución de la audición</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Intento de suicidio</td>
                        <td style="border: 1px solid black"></td>
                        <td>Sensación de oído tapado (más de una ves a la semana)</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Tuberculosis pulmonar</td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedad cardiovascular</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Asma bronquial</td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedades de la piel</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Tos persistente</td>
                        <td style="border: 1px solid black"></td>
                        <td>Ulcera persistente en la piel</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Palpitaciones</td>
                        <td style="border: 1px solid black"></td>
                        <td>Lunar que cambia de forma, tamaño y/o color</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Arritmia</td>
                        <td style="border: 1px solid black"></td>
                        <td>sensibilidad a la luz solar</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Dolor o disconfort en el tórax</td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedad de mamas (tumoraciones, cambios de color en la piel, etc.)</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Hipertensión arterial                        </td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedad 1endocrinológica</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Hinchazón de los miembros inferiores</td>
                        <td style="border: 1px solid black"></td>
                        <td>Diabetes</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Dolor en piernas al caminar</td>
                        <td style="border: 1px solid black"></td>
                        <td>Dislipidemia</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Episodio coronario de algún tipo</td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedad de tiroides</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Dificultad para deglutir</td>
                        <td style="border: 1px solid black"></td>
                        <td>Gota</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Ardor en el estómago
                        </td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedad de las articulaciones</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Úlcera Gástrica o duodena</td>
                        <td style="border: 1px solid black"></td>
                        <td>Reumatismo</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Desordenes intestinales</td>
                        <td style="border: 1px solid black"></td>
                        <td>Artritis</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Dolor abdominal recurrente</td>
                        <td style="border: 1px solid black"></td>
                        <td>Movilidad limitada de miembros superiores o inferiores</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Hernias en la pared abdominal</td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedad ósea (de los huesos)</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Sangrado por el sistema digestivo (como
                            vómitos o con deposiciones)</td>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedad de la columna</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedades del hígado</td>
                        <td style="border: 1px solid black"></td>
                        <td>Anemia</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Vómitos recurrentes</td>
                        <td style="border: 1px solid black"></td>
                        <td>Desorden de Coagulación o sangrado</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Hepatitis tipo A, B o C</td>
                        <td style="border: 1px solid black"></td>
                        <td>Hemolisis</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Cálculos en la vesícula</td>
                        <td style="border: 1px solid black"></td>
                        <td>Policitemia</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Síndrome con colon irritable</td>
                        <td style="border: 1px solid black"></td>
                        <td>Hemofilia</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Síndrome con colon irritable</td>
                        <td style="border: 1px solid black"></td>
                        <td>Dolor en la columna dorsal
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Enfermedades de trasmisión sexual</td>
                        <td style="border: 1px solid black"></td>
                        <td>Lumbalgia</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>SIDA, portador de VIH</td>
                        <td style="border: 1px solid black"></td>
                        <td>Dolor en el cuello</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Disturbios visuales
                        </td>
                        <td style="border: 1px solid black"></td>
                        <td>Movilidad Limitada de la columna</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Alergias a medicinas, comidas u otros agentes</td>
                        <td style="border: 1px solid black"></td>
                        <td>Otras enfermedades o condiciones no mencionadas arriba
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Infección o enfermedad urinaria</td>
                        <td style="border: 1px solid black"></td>
                        <td>Cálculos renales</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Presencia de sangre en la orina,
                            Proteínas o glucosa</td>
                        <td style="border: 1px solid black"></td>
                        <td>Hiperplasia de Próstata </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"></td>
                        <td>Dificultad al orinar</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div>
                <p>Aquellas enfermedades o condiciones marcadas serán evaluadas con mayor detalle durante la entrevista médica ocupacional</p>
                <p>TODA LA INFORMACION QUE HE PROPORCIONADO ES VERDADERA, NO HABIENDO OMITIDO NINGUN DATO EN FORMA VOLUNTARIA</p>
                <br />
                <table>
                    <tr>
                        <td></td>
                        <td>
                            <div style="height: 160px; width: 140px; border: 1px solid black;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">
                            ___________________________________________<br />
                            Apellidos y Nombres: {{ $trabajador->nombre_completo }}<br />
                            DNI/CE: {{ $trabajador->rut }}
                        </td>
                        <td style="font-weight: bold">
                            Fecha: {{ $contrato->fecha_larga }}
                        </td>
                    </tr>
                </table>
            </div>
            <br />
            <div>
                <p style="font-weight: bold;">Nota: proporcionar información falsa al empleador está tipificada como falta grave, según lo dispuesto en el inciso del articulo
                    25 el TUO de la ley de productividad y competitividad laboral.</p>
            </div>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page1" class="contrato">
        <div style="float: right">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(80)->generate($codigo)) !!}" />
        </div>
        <br /><br />
        <h4 class="titulo">CONTRATO DE TRABAJO SUJETO A MODALIDAD <b>{{ $contrato->tipo_contrato->name }}</b></h4>
        <p>Conste mediante el presente documento el <b>Contrato de Trabajo sujeto a modalidad <span style="text-transform: capitalize">{{ $contrato->tipo_contrato->name }}</span></b> en adelante <b>EL CONTRATO</b>-, que se suscribe de conformidad con lo establecido en la Ley N° 31110, Ley del Régimen Laboral Agrario y de Incentivos para el Sector Agrario y Riego, Agroexportador y Agroindustrial; y los artículos 64° al 66° del Texto Único Ordenado del Decreto Legislativo Nº 728, Ley de Productividad y Competitividad Laboral, D.S. Nº 003-97-TR (en adelante LPCL), entre:</p>
        <ul>
            <li>
                <b>SOCIEDAD AGRICOLA RAPEL S.A.C.</b>, R.U.C. Nº 20451779711, con domicilio en Caserío el Papayo Mz. O, Distrito de Castilla, Provincia y Departamento de Piura, debidamente representada por su Apoderado, Sr. Carrillo Curay Federico, identificado con Documento Nacional de Identidad Nº  44554215, a la que en adelante le denominará <b>EL EMPLEADOR</b>; y de la otra parte,
            </li>
            <li>
            <b><i>{{ $trabajador->apellidos }}, {{ $trabajador->nombre }}</i></b> con DNI o C.E. Nº <b>{{ $trabajador->rut }}</b>, con domicilio en <b>{{ $trabajador->direccion }}</b>, Distrito de <b>{{ $trabajador->distrito->name }}</b>, Provincia de <b>{{ $trabajador->distrito->provincia->name }}</b>, Departamento de <b>{{ $trabajador->distrito->provincia->departamento->name }}</b>, con fecha de nacimiento <b>{{ $trabajador->fecha_format }}</b> y de Nacionalidad <b>{{ $trabajador->nacionalidad->name }}</b>, a quien en adelante se le denominará <b>EL TRABAJADOR</b>.
            </li>
        </ul>
        <p>En los términos y condiciones que constan en las cláusulas siguientes:</p>
        <ol>
            <li>
                <b><u>PRIMERA</u>: Antecedentes.-</b><br/>
                1.1	<b>EL EMPLEADOR</b> es una persona jurídica cuya actividad principales de naturaleza agrícola, desarrollando los procesos necesarios involucrados en la siembra, cosecha, empaque, y exportación del producto agrícola.
                <br>1.2	<b>EL TRABAJADOR</b> declara estar capacitado para desempeñarse en el cargo para el que se le contrata, contando con experiencia para cumplir con la prestación de servicios en el cargo objeto de <b>EL CONTRATO</b>.
                <br>1.3 	Los antecedentes antes señalados y las competencias y aptitudes que son inherentes a los mismos han sido tenidos en especial consideración por <b>EL EMPLEADOR</b> para la contratación de <b>EL TRABAJADOR</b>, acordando las partes que tales competencias y aptitudes tienen el carácter de esenciales para la celebración de este contrato.

            </li>
            <li>
                <b><u>SEGUNDO:</u> Causa objetiva de la contratación.-</b>
                <br>2.1 Considerando la naturaleza agrícola de sus actividades, las mismas que son de carácter permanente pero discontinúo, con períodos de incremento y de inactividad, <b>EL EMPLEADOR</b> requiere contratar a plazo fijo y bajo la modalidad <b>{{ $contrato->tipo_contrato->name }}</b> los servicios de <b>EL TRABAJADOR</b>.
                <br>2.2	<b>EL EMPLEADOR</b>, conforme lo señalado en el párrafo anterior, precisa que la intermitencia se basa en la naturaleza agrícola de las actividades a desarrollar, las cuales están afectas a factores externos como clima, suelo, crecimiento del producto agrícola, etc. Dichos factores externos escapan al control d<b>el EMPLEADOR</b>, por lo cual la necesidad del recurso humano no puede ser prevista con exactitud, y se irá adecuando en cada oportunidad, según el requerimiento de las áreas involucradas.
            </li>
            <li>
                <b><u>TERCERO:</u> Objeto.-</b>
                <br>3.1	En razón de la causa objetiva señalada en la cláusula anterior, <b>EL EMPLEADOR</b> contrata a plazo fijo bajo la modalidad indicada, los servicios de <b>EL TRABAJADOR</b> para que desempeñe el cargo de {{ $contrato->oficio->name }}.
                <br>3.2	<b>EL TRABAJADOR</b> conoce y entiende que <b>EL EMPLEADOR</b> cuenta con facultades de dirección reconocida en el artículo 9° de la LPCL, por lo cual, en ejercicio legítimo de la misma, <b>EL EMPLEADOR</b> puede organizar y controlar el buen cumplimiento de las obligaciones de <b>EL TRABAJADOR</b>.
                <br>3.3	<b>EL EMPLEADOR</b> en función de sus necesidades y requerimientos podrá modificar las condiciones de la prestación de los servicios objeto de la relación laboral, siendo pasibles de variación lo referente a la jornada y horario de trabajo, designación del centro de labores a cualquiera de las sedes que existan en su oportunidad, forma, funciones, categoría, modalidad dentro de los límites que la razonabilidad y la ley establecen. <b>EL TRABAJADOR</b> entiende que dichas variaciones no significan una rebaja de categoría y/o remuneración.
            </li>
            <li>
                <b><u>CUARTO:</u> Funciones del TRABAJADOR.-</b>
                <br>4.1 La prestación de los servicios de <b>EL TRABAJADOR</b> comprende todas aquellas actividades relacionadas y complementarias al cargo indicado en la Cláusula Tercera de <b>EL CONTRATO</b>, así como aquellas que se le indiquen en función del cumplimiento de las actividades de <b>EL EMPLEADOR</b>.
                <br>4.2	<b>EL EMPLEADOR</b> señala que <b>EL TRABAJADOR</b> deberá realizar las siguientes funciones:

                <ol class="lista-romanos sin-espacios">
                    <li>Funciones específicas.</li>
                    <li>Labores de siembra, cosecha y empaque del producto agrícola para ser exportado.</li>
                    <li>Cualquier otra que le sea asignada por <b>EL EMPLEADOR</b>.</li>
                </ol>
                <br>4.3 <b>EL EMPLEADOR</b> señala de manera expresa que las funciones detalladas se efectúan únicamente con fines enunciativos; en consecuencia, <b>EL TRABAJADOR</b> deberá realizar todas aquellas funciones vinculadas a la naturaleza del cargo objeto de <b>EL CONTRATO</b>, según lo establecido por <b>EL EMPLEADOR</b>.
            </li>
            <li>
                <b><u>QUINTO:</u> Plazo del Contrato.-</b>
                <br>5.1	El plazo de vigencia del presente contrato es de tres (3) meses, y rige desde el <b>{{ $contrato->fecha_larga }}</b>  hasta el <b>{{ $contrato->fecha_larga_termino }}</b>.
                <br>5.2 <b>EL EMPLEADOR</b> no está obligado a dar aviso adicional alguno referente al término del presente contrato, operando su extinción en la fecha de su vencimiento, oportunidad en la cual se abonará a <b>EL TRABAJADOR</b> los beneficios sociales que le pudieran corresponder, de acuerdo a Ley.
                <br>5.3	Si la naturaleza del trabajo así lo requiere se podrá prorrogar el tiempo de vigencia de <b>EL CONTRATO</b>, en común acuerdo de ambas partes, debiéndose de firmar en este caso la prórroga respectiva.
                <br>5.4	La suspensión de <b>EL CONTRATO</b>, cualquiera que fuera el supuesto, no interrumpe ni suspende el plazo de extinción de la relación laboral sujeta a plazo fijo. Por ende, si por alguna circunstancia <b>EL TRABAJADOR</b> estuviera percibiendo prestaciones por enfermedad o accidente de trabajo al vencimiento calendario del presente contrato, ello no significa en forma alguna la prolongación del plazo fijo contratado, ni la conversión de éste en indeterminado.
                <br>Siendo así, simultáneamente a la cesación en la percepción de prestaciones, se producirá la terminación de la relación contractual de trabajo descrita en el presente documento, con efectividad a la fecha de vencimiento del mismo.
            </li>
            <li>
                <b><u>SEXTO:</u> Período de Prueba.-</b>
                <br><b>EL EMPLEADOR</b> señala que conforme a lo establecido en el artículo 10° de la LPCL-, <b>EL TRABAJADOR</b> estará sujeto a un período de prueba de tres (3) meses. <b>EL TRABAJADOR</b> conoce y entiende que durante este período de prueba <b>EL EMPLEADOR</b> podrá extinguir la relación laboralsin expresión de causa, y ello no generará el pago de concepto indemnizatorio alguno.
            </li>
            <li>
                <b><u>SEPTIMO:</u> Jornada y horario de trabajo.-</b>
                <br>7.1	<b>EL TRABAJADOR</b> deberá cumplir el horario de trabajo señalado por <b>EL EMPLEADOR</b>, la cual será fijada respetando la jornada máxima de 48 horas semanales, ello de conformidad con lo previsto en el artículo 1º del Decreto Supremo Nº 007-2002-TR, Texto Único Ordenado de la Ley de Jornada de Trabajo, Horario y Trabajo en Sobretiempo.
                <br>7.2 Conforme a ello, las partes convienen en que <b>EL EMPLEADOR</b> de acuerdo con las necesidades operativas que surjan, tendrá la facultad de determinar y variar los días de trabajo, los días de descanso, los horarios y las jornadas de trabajo, toda vez que ambas partes conocen y entienden que las labores a cargo del TRABAJADOR están sujetas a condiciones variables -tanto de suelo como climáticas- por lo cual se requiere que existan las condiciones propicias para que <b>EL TRABAJADOR</b> pueda cumplir con la prestación a su cargo. <b>EL TRABAJADOR</b> presta expreso consentimiento a esta prerrogativa de <b>EL EMPLEADOR</b>.
                <br>7.3	Las ausencias injustificadas por parte de <b>EL TRABAJADOR</b> implican la pérdida de la remuneración proporcionalmente a la duración de dicha ausencia. Sin perjuicio de ello, <b>EL TRABAJADOR</b> entiende que en los supuestos de ausencias injustificadas <b>EL EMPLEADOR</b> podrá aplicar las medidas disciplinarias que estime convenientes, según su normativa interna, así como lo previsto en la legislación laboral; ello en ejercicio legítimo de su facultad disciplinaria.
                <br>7.4	<b>EL TRABAJADOR</b> tendrá derecho a gozar de cuarenta y cinco (45) minutos de refrigerio, tiempo que no forma parte de la jornada de trabajo, tal como se establece en el artículo 7° del Texto Único Ordenado de la Ley de Jornada de Trabajo, el cual se hará efectivo en función de la organización del área en la que prestará labores <b>EL TRABAJADOR</b>.
                <br>7.5	<b>EL EMPLEADOR</b> señala que <b>EL TRABAJADOR</b> tendrá derecho a gozar del día de descanso semanal obligatorio conforme lo establecido en el artículo 1° del Decreto Legislativo N° 713.
            </li>
            <li>
                <b><u>OCTAVO:</u> Obligaciones del Trabajador.-</b>
                <br>8.1	<b>EL TRABAJADOR</b> debe desarrollar las labores a su cargo de manera puntual, responsable y eficiente, cumpliendo con las indicaciones e instrucciones impartidas por <b>EL EMPLEADOR</b>.
                <br>8.2	<b>EL TRABAJADOR</b> recibirá una copia del Reglamento Interno de Trabajo, del Reglamento de Seguridad y Salud en el Trabajo, y de las políticas establecidas por <b>EL EMPLEADOR</b>, estando obligado a revisarlos, conocer su contenido y cumplir con lo señalado en dichos documentos.
            </li>
            <li>
                <b><u>NOVENO:</u> Remuneración.-</b>
                <br>9.1	En contraprestación a los servicios prestados por <b>EL TRABAJADOR</b>, <b>EL EMPLEADOR</b> se obliga a pagar una remuneración diaria (jornal) bruta ascendente a S/. 39.19 (TREINTA Y NUEVE CON 19/100 SOLES), remuneración que se encuentra comprendida por el básico de S/ 31.01 (TREINTA Y UNO CON 01/100 SOLES) más el concepto de CTS equivalente al 9.72% de S/ 3.01 (TRES CON 01/100 SOLES) y el concepto de Gratificaciones de fiestras patrias y de navidad equivalente al 16.66% de S/ 5.17(CINCO CON 17/100 SOLES), monto del cual deducirán las aportaciones y descuentos establecidos en la ley. Adicionalmente una Bonificación Especial por Trabajo Agrario (BETA) del 30% de la RMV con carácter no remunerativo. <br />Así mismo el trabajador elegiría recibir los conceptos de CTS y gratificaciones en los plazos que la ley establece, sin que entren a ser prorrateados en la RD; elección que forma parte integrante de este contrato como Anexo 2.
                <br>9.2	<b>EL EMPLEADOR</b> al encontrarse acogido al régimen agrario, precisa que la remuneración abonada a <b>EL TRABAJADOR</b> incluye la compensación por tiempo de servicios y las gratificaciones de fiestas patrias y de navidad, más una Bonificación Especial por Trabajo Agrario (BETA) del 30% de la RMV con carácter no remunerativo, conforme lo previsto en los incisos c) y el e) de la Ley N° 31110, Ley del Régimen Laboral Agrario y de Incentivos para el Sector Agrario y Riego, Agroexportador y Agroindustrial. De la msima forma, de acuerdo al inciso d) del mismo cuerpo normativo, de forma facultativa, el trabajador elegirá recibir los conceptos de CTS y gratificaciones en los plazos que la let estable, sin que entren a ser prorrateados en la RD; elección que forma parte de integrante de este contrato como Anexo 3.
                <br>9.3	<b>EL TRABAJADOR</b> declara que la remuneración señalada en esta cláusula constituye una adecuada compensación por los servicios prestados a <b>EL EMPLEADOR</b>, así como por las obligaciones asumidas en el presente contrato.
            </li>
            <li>
                <b><u>DECIMO:</u> Entrega de Herramientas de Trabajo.-</b>
                <br>10.1	<b>EL EMPLEADOR</b> proporcionará a <b>EL TRABAJADOR</b> los materiales y herramientas de trabajo necesarias para el adecuado desarrollo de sus actividades, <b>EL TRABAJADOR</b> será responsable de mantener el buen estado de las herramientas y/bienes de trabajo asignados, los mismas que sólo deben sufrir el desgaste propio y natural provocado por el uso normal.
                <br>10.2	<b>EL TRABAJADOR</b> será responsable por los daños, pérdidas, extravíos o robos de las herramientas y/o bienes de trabajo que se le hayan asignado. En este sentido y conforme lo establecido en la “Política de Entrega y Manejo de Herramientas, Bienes y Vehículos de Trabajo” <b>EL TRABAJADOR</b> autoriza expresamente a <b>EL EMPLEADOR</b> a deducir de su remuneración (de su liquidación de beneficios sociales en caso de extinción de la relación laboral) el costo de la reparación o reposición de la o las herramientas de trabajo.
            </li>
            <li>
                <b><u>DECIMO PRIMERO:</u> Buena Fe.-</b>
                <br><b>EL TRABAJADOR</b> se obliga en forma expresa a poner al servicio d<b>el EMPLEADOR</b> toda su capacidad y lealtad, así como a la protección de sus intereses, en razón del cargo para el cual se le contrata. Asimismo, desarrollará las labores encargadas según las indicaciones impartidas por <b>EL EMPLEADOR</b>.
            </li>
            <li>
                <b><u>DECIMO SEGUNDO:</u> Exclusividad.-</b>
                <br>Los servicios de <b>EL TRABAJADOR</b> son contratados con el carácter de exclusividad, de manera tal que durante la vigencia de la relación laboral <b>EL TRABAJADOR</b> se compromete a dedicar todo su tiempo, desplegar la energía y aplicar la experiencia que sean necesarios para el servicio y la protección de los intereses de <b>EL EMPLEADOR</b>, no pudiendo dedicarse a actividades por cuenta propia o de terceros que le distraigan del cumplimiento cabal de sus obligaciones para con <b>EL EMPLEADOR</b>.
            </li>
            <li>
                <b><u>DECIMO TERCERO:</u> Registro del Contrato.-</b>
                <br><b>EL EMPLEADOR</b> se obliga a inscribir a <b>EL TRABAJADOR</b> en los registros correspondientes, así como a poner conocimiento de la Autoridad Administrativa de Trabajo el presente contrato para su conocimiento y registro, en cumplimiento de lo dispuesto en el Decreto Supremo Nº 003-97-TR.
            </li>
            <li>
                <b><u>DECIMO CUARTO:</u> Sistema de Pensiones.-</b>
                <br>De acuerdo a los artículos 15 y 16 de la Ley 28991, <b>EL TRABAJADOR</b> dentro del plazo legal comunicará a <b>EL EMPLEADOR</b> su desición respecto del derecho a afiliarse a cualquiera de los regímenes previsionales, en el supuesto que <b>EL TRABAJADOR</b> no cumpla con la comunicación indicada, <b>EL EMPLEADOR</b> lo afiliará al Sistema Privado de Pensiones (AFP) en las condiciones señaladas en el artículo 6° del TUO de la Ley del Sistema Privado de Pensiones.
            </li>
            <li>
                <b><u>DECIMO QUINTO:</u> Seguridad y Salud.-</b>
                <br>15.1 En cumplimiento de lo establecido en la Ley N° 29783, Ley de Seguridad y Salud en el Trabajo, y habiendo analizado el riesgo de las funciones propias del cargo a desempeñar por <b>EL TRABAJADOR</b>, con la finalidad de dar cumplimiento a las recomendaciones en materia de seguridad y salud destinadas a evitar cualquier riesgo para <b>EL TRABAJADOR</b> durante el desarrollo de las actividades del cargo indicado, se señala de manera expresa la obligación de ejecutar las recomendaciones aplicables, las cuales serán desarrolladas en el Anexo 1 del presente documento.
                <br>15.2 <b>EL TRABAJADOR</b> entiende que es su obligación conocer el Reglamento de Seguridad y Salud que se le entregará al inicio de la relación laboral, así como asistir a las capacitaciones sobre la materia que sean programadas por <b>EL EMPLEADOR</b>.
                <br>15.3 <b>EL EMPLEADOR</b> establece de manera expresa que el incumplimiento de obligaciones en materia de seguridad y salud por parte de <b>EL TRABAJADOR</b> son consideradas faltas graves toda vez que suponen un riesgo para la salud e integridad del mismo y de las otras personas que se encuentren en el centro de trabajo. Por lo cual, <b>EL EMPLEADOR</b> establece como lineamiento de actuación el de  “tolerancia cero” respecto a faltas cometidas en materia de seguridad y salud, sancionando las mismas con el despido y la imposibilidad de ser recontratado.
            </li>
            <li>
                <b><u>DECIMOSEXTO:</u> Del período de inactividad.-</b>
                <br>16.1 	Conforme la naturaleza intermitente de las actividades realizadas por <b>EL TRABAJADOR</b>, en el supuesto que exista un período de inactividad, <b>EL CONTRATO</b> podrá ser suspendido. El período de suspensión no afecta la vigencia de <b>EL CONTRATO</b>.
                <br>16.2	La suspensión será comunicada a <b>EL TRABAJADOR</b>, indicándosele la fecha probable del reinicio de las actividades. En el supuesto que en la fecha señalada no existan las condiciones adecuadas para el reinicio de labores, se procederá a indicar una nueva fecha.
                <br>16.3	El cálculo de los beneficios sociales de ELTRABAJADOR, y el tiempo de servicios se determinarán en función de los períodos efectivamente laborados, razón por la cual los períodos en que no exista prestación efectiva de labores por parte de <b>EL TRABAJADOR</b>, serán considerados suspensión perfecta de labores.
                <br>16.4	Ambas partes declaran que durante la suspensión perfecta de labores <b>EL TRABAJADOR</b> no deberá asistir al centro de labores, ni realizará labores efectivas, por lo tanto <b>EL EMPLEADOR</b> no abonará remuneración alguna durante dicho período.
                <br>16.5	<b>EL TRABAJADOR</b> entiende y conoce que la suspensión de labores no genera pago de remuneración durante el período de suspensión; asimismo, conoce y entiende que la suspensión del contrato de trabajo bajo ninguna circunstancia equivale a despido.
            </li>
            <li>
                <b><u>DECIMO SETIMO:</u> Derecho de preferencia.-</b>
                <br>17.1 Para la reanudación de las labores suspendidas <b>EL EMPLEADOR</b> verificará que exista necesidad de recurso humano para el desarrollo de las labores descritas en la cláusula segunda; es decir, que el producto agrícola se encuentre en condiciones determinadas para continuar a la siguiente etapa o labor.
                <br>17.2 <b>EL EMPLEADOR</b> respetará el derecho de preferencia de <b>EL TRABAJADOR</b>, quien contará con un plazo máximo de cinco (5) días hábiles –contados desde la fecha señalada en el comunicado de suspensión- para hacer uso de su derecho de preferencia y proceda a reincorporarse a sus labores.
                <br>En el supuesto que no se reincorpore dentro del período de cinco (5) días hábiles, <b>EL CONTRATO</b> se resuelve de pleno derecho, quedando a salvo el derecho de  <b>EL TRABAJADOR</b>  de solicitar la liquidación de sus beneficios sociales que le corresponda.
            </li>
            <li>
                <b><u>DECIMO OCTAVO:</u> Condición resolutoria.-</b>
                <br>18.1 En el supuesto que por lo factores señalados o por cualquier otra circunstancia, la prestación a cargo de <b>EL TRABAJADOR</b> resulte innecesaria o imposible con anterioridad al vencimiento del contrato, <b>EL EMPLEADOR</b> podrá resolver <b>EL CONTRATO</b>.
                <br>18.2 <b>EL TRABAJADOR</b> declara expresamente que conoce y entiende que la resolución de contrato no equivale a despido, sino que la misma obedece a la imposibilidad de realizar las prestaciones para la cual fue contratado, o a la extinción de la necesidad que dio origen a la celebración de <b>EL CONTRATO</b>.
            </li>
            <li>
                <b><u>DECIMO NOVENO:</u> Solución de Controversias.-</b>
                Para todos los efectos emergentes de este contrato, las partes constituyen domicilio especial en los indicados en el encabezamiento del presente, donde serán válidas y surtirán plenos efectos todas las comunicaciones que deban cursarse con motivo del mismo. Asimismo, para cualquier discrepancia que se suscite entre las partes con motivo del presente, se pacta la jurisdicción y competencia de los Tribunales Ordinarios del Distrito Judicial de Piura.
            </li>
        </ol>
        <p>En señal de conformidad, las partes suscriben el presente documento por triplicado, en la ciudad de Piura, el <b>{{ $contrato->fecha_larga }}</b>.</p>
        <table style="width: 100%; font-weight: bold; text-align: center; margin-top: 100px">
            <tr>
                <td>___________________<br>EL EMPLEADOR</td>
                <td>___________________<br>EL TRABAJADOR</td>
            </tr>
        </table>
    </section>

    <div class="page-break"></div>

    <section id="page2" style="font-size: 15px">
    </section>

    <div class="page-break"></div>

    <section style="font-size: 14px">
        <h4 class="titulo">ANEXO 1</h4>
        <p>
            El presente documento ha sido elaborado en virtud de lo establecido en el inciso c) del artículo 35° de la Ley N° 29783, Ley de Seguridad y Salud en el Trabajo, indicándose las funciones propias de <b>{{ $contrato->oficio->name }}</b>, a ser desarrolladas por <b>EL TRABAJADOR</b>.
        </p>
        <p>
            Igualmente se establecerán los posibles riesgos a los cuales puede encontrarse expuesto por la realización de dichas funciones y las recomendaciones referidas a las medidas de prevención destinadas a evitar los riesgos mencionados.
        </p>
        <br />
        <table class="tabla">
            <thead>
                <tr>
                    <td><b>Cargo o Puesto de trabajador</b></td>
                    <td><b>{{ $contrato->oficio->name }}</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Descripción de Funciones</b></td>
                    <td>Encargado de realizar las labores en los campos designados. </td>
                </tr>
                <tr>
                    <td><b>Riesgos expuestos</b></td>
                    <td>
                        <ul class="lista-sin-estilos">
                            <li>Exposición a altas temperaturas</li>
                            <li>Caída de personas a distinto nivel</li>
                            <li>Caída de personas al mismo nivel</li>
                            <li>Atropellos o golpes con vehículos</li>
                            <li>Choque contra objetos fijos</li>
                            <li>Golpes y cortes con objetos y herramientas</li>
                            <li>Atrapamiento por o entre objetos</li>
                            <li>Vuelco de máquinas o vehículos</li>
                            <li>Posturas prolongadas, movimientos repetitivos (riesgos disergonómicos)</li>
                            <li>Sobreesfuerzos (riesgo disergonómico)</li>
                            <li>Proyección de fragmentos o partículas</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td><b>Medidas de Prevención</b></td>
                    <td>
                        <ul class="lista-sin-estilos">
                            <li>Uso de ropa adecuada</li>
                            <li>Señalización</li>
                            <li>Orden y limpieza</li>
                            <li>Capacitación de los trabajadores</li>
                            <li>Mantener distancias de seguridad</li>
                            <li>Cumplimiento de normas de manual de instrucciones, objetos punzantes de embalajes, piezas, etc</li>
                            <li>Adecuado uso y mantenimiento del equipo de protección personal</li>
                            <li>Diseño ergonómico del puesto de trabajo</li>
                            <li>Al levantar materiales, el Trabajador deberá doblar las rodillas y mantener la espalda lo más recta posible</li>
                            <li>Debe proveerse de lentes de seguridad, en todos aquellos trabajos donde esté presente dicho riesgo</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 20px; font-weight: bold">
            <table style="width: 100%; text-align: center">
                <tr>
                    <td>
                        <img src="{{ public_path() . '/img/Firma-Federico.jpg' }}" style="width: 180px">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="vertical-align: top">__________________<br/>EL EMPLEADOR</td>
                    <td style="vertical-align: top">__________________<br/>EL TRABAJADOR<br/>DNI: {{ $trabajador->rut }}</td>
                </tr>
            </table>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page3"></section>

    <div class="page-break"></div>

    <section id="page4" style="font-family: 'Times-New-Roman'; font-size: 10px">
        <table style="width: 100%;">
            <tr>
                <td><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="60px" /></td>
                <td><h4 style="text-align: left" class="titulo">CÓDIGO DE CONDUCTA</h4></td>
            </tr>
        </table>

        <p>De acuerdo a la implementación de las normas internacionales (BSCI, SMETA, GRAPS, WALMART, WAITROSE, ETC) que promueven los más altos estándares en responsabilidad laboral y social a nivel mundial, <b>SOCIEDAD AGRÍCOLA RAPEL S.A.C.</b> (en adelante LA EMPRESA) rige su accionar de acuerdo a los siguientes criterios:</p>

        <ol class="espacios-lista">
            <li>
                <b>Trabajo infantil</b><br>LA EMPRESA prohíbe el trabajo infantil. En ese sentido, los trabajadores deben tener 18 años de edad como mínimo para ser contratados. Por trabajo infantil se entiende cualquier labor mental, física, social o moralmente peligrosa o dañina para los niños, o que interfiere directamente en sus necesidades de educación obligatoria definida como tal por la autoridad correspondiente.
            </li>
            <li>
                <b>Trabajo de libre elección y no forzoso</b><br>La mano de obra ilegal, abusiva o forzosa no tiene cabida en las actividades de LA EMPRESA ni en las actividades de nuestros proveedores. En ese sentido,  LA EMPRESA no impondrá el trabajo sino que será de libre elección por parte del trabajador. Se prohíbe cualquier tipo de servidumbre esclavizante o forma alguna de realizar el trabajo de manera involuntaria.  LA EMPRESA no exigirá depósitos ni retendrá documentos originales de identidad como condición de trabajo. Asimismo, no subcontratará proveedores o instalaciones de producción que obliguen que el trabajo sea realizado bajo algún tipo de explotación o trabajo forzado.
            </li>
            <li>
                <b>Seguridad y salud en el trabajo</b><br>LA EMPRESA proporciona un lugar de trabajo seguro, higiénico y saludable, tomando así las medidas necesarias para prevenir accidentes y lesiones que surjan en el desarrollo del trabajo, se relacionen con él, o que ocurran como resultado de las operaciones de la empresa. LA EMPRESA tiene sistemas para detectar, evitar y responder a posibles riesgos de la seguridad y la salud de todos sus colaboradores. Asimismo, LA EMPRESA brindará acceso a agua potable, zonas limpias y seguras para almacenamiento de comidas, cumpliendo las necesidades básicas de los trabajadores.  El trabajador podrá negarse a cualquier tipo de trabajo inseguro o que ponga en riesgo su vida. Los trabajadores serán informados de manera regular sobre la seguridad e higiene, ya sean nuevos o reasignados, otorgando la responsabilidad a un representante del Comité de Seguridad y Salud en el Trabajo
            </li>
            <li>
                <b>Libertad de asociación y negociación colectiva</b><br>LA EMPRESA respeta el derecho a formar comités según interés y/o unirse a comités creados por la empresa, además de las decisiones de sus colaboradores, asimismo, facilitará el tiempo necesario para entablar discusiones, encontrar soluciones, y llegar a acuerdos conjuntamente con administración sobre: seguridad, salud, bienestar y demás conflictos colectivos de todos los trabajadores. El empleador y sus representantes velarán por las mejores condiciones y seguridad para sus trabajadores, mostrando una actitud tolerante hacia sus distintas actividades. Los representantes de los trabajadores no serán discriminados y tendrán acceso a desarrollar sus funciones representativas en el lugar de trabajo. El empleador continuará facilitando, sin dificultad alguna, el desarrollo de las actividades, en caso la ley restrinja el derecho de la libertad de asociación y a la negociación colectiva.
            </li>
            <li>
                <b>Discriminación</b><br>LA EMPRESA prohíbe las prácticas de discriminación en la contratación de personal y en la conducta profesional del mismo por cuestiones de raza, color, religión, sexo, edad, capacidades físicas, nacionalidades o cualquier otra condición prohibida legalmente
            </li>
            <li>
                <b>Protección especial para trabajadores</b><br> jóvenes LA EMPRESA promueve la contratación de jóvenes entre 18 a 24 años, para que cuenten con mayores oportunidades de acceso al mercado laboral a través de un empleo con calidad y protección social.
            </li>
            <li>
                <b>Horario de trabajo no excesivo</b><br>LA EMPRESA es responsable de asegurar que sus colaboradores trabajen dentro de la jornada máxima permitida por la normatividad laboral vigente y los estándares laborales referentes al número de horas y días de trabajo. En caso de conflicto entre un estatuto y un estándar industrial mandatorio, LA EMPRESA  deberá dar solución bajo lo establecido en función al que brinde un mayor beneficio para el trabajador. Las horas extras serán de manera voluntaria y, además, debe de existir un convenio colectivo negociado libremente o en circunstancias excepcionales donde el empleador demuestre que surgieron de manera inesperada. Se debe otorgar al personal por lo menos un día libre a continuación de cada período consecutivo de seis días laborados.
            </li>
            <li>
                <b>Remuneración digna</b><br>LA EMPRESA deberá proporcionar a sus colaboradores salarios y beneficios que cumplan al menos con las leyes aplicables, en caso contrario, salarios que cubran las necesidades básicas, incluyendo aquellos referentes al pago por horas extras. LA EMPRESA informará de manera escrita y comprensible antes de que acepten el trabajo, los diversos detalles durante el periodo de su pago, así como también, las deducciones al salario que serán aplicables según ley, las cuales deberán ser registradas.
            </li>
            <li>
                <b>Trabajo precario</b><br>LA EMPRESA proporciona a sus trabajadores información clara sobre sus derechos, responsabilidades, condiciones laborales y condiciones de trabajo dignas.
            </li>
            <li>
                <b>Medio ambiente</b><br>LA EMPRESA realiza sus operaciones en cumplimiento de las normativas aplicables y de sus compromisos ambientales que incluyen monitoreo de emisiones, manejo de aguas residuales, ruido ambiental, residuos sólidos, entre otros; mitigando de esta manera sus impactos ambientales y esforzándose por mejorar continuamente su desempeño ambiental.
            </li>
            <li>
                <b>Comportamiento empresarial ético</b><br>LA EMPRESA se asegurará de que sus proveedores estén informados de este Código de Conducta, de sus términos y condiciones, así como de su significado y lo que implica su implementación.
                Declaro por tanto haber recibido una copia de código de conducta, así también, declaro haberlo leído cuidadosamente.
            </li>
        </ol>

        <div style="margin-top: 35px; margin-left: 40px">
            <p style="font-weight: bold">
                ____________________________________________________________<br>
                Nombre: <span>{{ $trabajador->nombre . ' ' . $trabajador->apellidos }}</span><br>
                DNI: <span>{{ $trabajador->rut }} </span><br>
                Cargo: <span>{{ $contrato->oficio->name }}</span><br>
            </p>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page5"></section>

    <div class="page-break"></div>

    <section id="page6">
        <div style="padding: 20px">
            <h4 class="titulo">DECLARACIÓN JURADA DE NO TENER ANTECEDENTES POLICIALES, PENALES NI JUDICIALES </h4>
            <br>
            <div style="font-size: 15px">
                <p>
                    YO, <b>{{ $trabajador->nombre_completo }}</b> IDENTIFICADO(A) CON DNI Nº <b>{{ $trabajador->rut }}</b> CON DOMICILIO REAL EN <b>{{ $trabajador->direccion }}</b> DEL DISTRITO DE <b>{{ $trabajador->distrito->name }}</b>, PROVINCIA <b>{{ $trabajador->distrito->provincia->name }}</b> Y <b>DEPARTAMENTO {{ $trabajador->distrito->provincia->departamento->name }}</b>, AL AMPARO DE LO PREVISTO EN EL ARTÍCULO 41° DE LA LEY N° 27444, LEY DEL PROCEDIMIENTO ADMINISTRATIVO GENERAL, EN APLICACIÓN DEL PRINCIPIO DE PRESUNCIÓN DE LA VERACIDAD; DECLARO BAJO JURAMENTO:
                </p>
                <ol>
                    <li>NO REGISTRAR ANTECEDENTES POLICIALES.</li>
                    <li>NO REGISTRAR ANTECEDENTES JUDICIALES.</li>
                    <li>NO REGISTRAR ANTECEDENTES PENALES.</li>
                </ol>
                <p>
                    QUIEN SUSCRIBE ENTIENDE QUE LA INFORMACIÓN CONSIGNADA ES VERAZ Y FIDEDIGNA, POR LA CUAL AUTORIZÓ A LA EMPRESA
                    A EFECTUAR LAS VERIFICACIONES QUE JUZGUE NECESARIAS EN CUALQUIER MOMENTO DE LA RELACIÓN LABORAL.
                </p>
                <p>
                    EN EL SUPUESTO SE CONSTANTE LA FALSEDAD DE LA INFORMACIÓN QUE HE PROPORCIONADO, QUIEN SUSCRIBE SERÁ PASIBLE DE LAS SANCIONES QUE LA EMPRESA ESTIME CONVENIENTE Y LA EMPRESA PODRÁ TOMAR LAS ACCIONES LEGALES CORRESPONDIENTES.
                </p>
                <p>EN FE DE LO CUAL FIRMO Y PONGO MI IMPRESIÓN DIGITAL. </p>
                <p style="text-align: right"><b>Piura, {{ $contrato->fecha_larga }}</b></p>
                <table style="width: 100%; font-weight: bold; margin-top: 70px; text-align: center">
                    <tr>
                        <td>
                            <div style="border: 1px solid black; width: 100px; height: 140px; margin: auto;"></div>
                        </td>
                        <td>
                            <div style="width: 100px; height: 140px;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">HUELLA DIGITAL <br> (INDICE DERECHO)</td>
                        <td style="width: 50%">_______________________________<br>FIRMA DEL TRABAJADOR <br> DNI/CE: {{ $trabajador->rut }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page7"></section>

    <div class="page-break"></div>

    <section id="page8">
        <h4 class="titulo">CONVENIO DE AUTORIZACIÓN PARA LA TRAMITACIÓN DE ANTECEDENTES POLICIALES </h4>
        <div style="font-size: 15px">
            <p>
                Conste por el presente documento, el CONVENIO DE AUTORIZACIÓN PARA LA TRAMITACIÓN DE ANTECEDENTES POLICIALES (en adelante “<b>EL CONVENIO</b>”) que suscriben de una parte <b>SOCIEDAD AGRICOLA RAPEL SAC</b>, identificado con RUC Nº 20451779711, inscrita en la Partida Electrónica N° 12619278, del Registro de Personas Jurídicas de Lima, con domicilio en Caserío el Papayo Mz O, Distrito de Castilla, debidamente representada por el Jefe de Recursos Humanos, Carrillo Curay Federico, identificado con D.N.I N° 44554215, a quien en lo sucesivo se denominará <b>EL EMPLEADOR</b>, y de la otra parte <b>{{ $trabajador->apellidos }} {{ $trabajador->nombre }}</b>, identificado (a) con D.N.I. N° <b>{{ $trabajador->rut }}</b>, con domicilio en <b>{{ $trabajador->direccion }}</b>, a quien en adelante se le denominará <b>EL TRABAJADOR</b>, en los términos y condiciones siguientes:
            </p>
            <ul class="espacios-lista-md">
                <li>
                    <b><u>PRIMERO:</u> ANTECEDENTES</b><br>
                    <b>EL EMPLEADOR</b> dentro de su Política de Contratación, en el artículo 2° establece los requisitos aplicables todos los trabajadores sin distinción  del cargo que ocupan y la naturaleza de sus funciones. Superado el proceso de selección EL EMPLEADOR,  conforme lo dispuesto en la Ley 29607, exige a <b>EL TRABAJADOR</b> la presentación del certificado de antecedentes policiales. </li>
                <li>
                    <b><u>SEGUNDO:</u> OBJETO DEL CONVENIO</b><br>
                    <b>EL EMPLEADOR</b> con la finalidad de otorgar facilidades suscribe el presente convenio, mediante el cual <b>EL TRABAJADOR</b>  autoriza expresamente a <b>EL EMPLEADOR</b>  la tramitación y obtención del certificado de antecedentes policiales.
                </li>
                <li>
                    <b><u>TERCERO:</u> DEL COSTO DE LOS CERTIFICADOS</b><br>
                    <b>EL TRABAJADOR</b> será quien asuma el costo de los certificados de antecedentes policiales, siendo el importe de S/. 11.00 (ONCE CON 00/100 SOLES), el cual será descontado de su remuneración en una (1) sola cuota, en el mes de {{ strtoupper($contrato->mes_contrato) }} - {{ $contrato->anio_contrato }}.

                    <b>EL TRABAJADOR</b> conoce y entiende que en el supuesto que se compruebe que mantiene deuda por el trámite de antecedentes policiales, el  costo será descontado del pago por los días efectivamente laborados  o de la liquidación de beneficios sociales respectiva o, por lo cual <b>EL TRABAJADOR</b> deja expresa constancia que autoriza a <b>EL EMPLEADOR</b> a realizar el descuento que corresponda.
                </li>
                <li>
                    <b><u>CUARTO:</u></b><br>
                    En todo lo no previsto en el presente Convenio, que se mantiene como documento privado, es aplicable la legislación laboral vigente.

                    En señal de conformidad, suscriben el presente documento las partes, en Piura, al <i>{{ $contrato->fecha_larga }}</i>.
                </li>
            </ul>
            <div>
                <table style="width: 100%; margin-top: 50px; text-align: center">
                    <tr>
                        <td>
                            <img src="{{ public_path() . '/img/Firma-Federico.jpg' }}" style="width: 200px">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>___________________________<br>EL EMPLEADOR</b></td>
                        <td><b>___________________________<br>EL TRABAJADOR</b></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page9"></section>

    <div class="page-break"></div>

    <section id="page10">
        <h4 class="titulo">CONSTANCIA DE ENTREGA DE REGLAMENTO INTERNO DE TRABAJO</h4>
        <br>
        <div style="padding: 25px;">
            <p>
                Yo, <b>{{ $trabajador->apellidos }}, {{ $trabajador->nombre }}</b><br>
                Identificado con D.N.I N° <b>{{ $trabajador->rut }}</b>, manifiesto haber recibido un ejemplar del Reglamento Interno de Trabajo, comprometiéndome a leerlo, estudiarlo y cumplirlo, durante la vigencia del vínculo laboral que mantengo con La Empresa.<br><br>
                Me comprometo voluntariamente a difundir y velar por su cumplimiento entre mis compañeros de trabajo.
            </p>
            <br><br><br><br>
            <p style="text-align: right"><b>Piura,  {{ $contrato->fecha_larga }}.</b></p>
            <table style="width: 100%; font-weight: bold; margin-top: 70px; text-align: center">
                <tr>
                    <td>
                        <div style="border: 1px solid black; width: 100px; height: 140px; margin: auto;"></div>
                    </td>
                    <td>
                        <div style="width: 100px; height: 140px;"></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%">HUELLA DIGITAL <br> (INDICE DERECHO)</td>
                    <td style="width: 50%">_______________________________<br>FIRMA DEL TRABAJADOR <br> DNI/CE: {{ $trabajador->rut }}</td>
                </tr>
            </table>
            <div style="margin-top: 200px; width: 100%">
                <hr>
                <small>Prohibida la reproducción total o parcial de este documento sin autorización de  SOCIEDAD AGRICOLA RAPEL S.A.C.</small>
            </div>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page11"></section>

    <div class="page-break"></div>

    <section id="page12">
        <table>
            <tr>
                <td style="vertical-align: center"><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="70px" /></td>
                <td style="font-size: 14px; vertical-align: bottom">REGLAMENTO INTERNO DE SEGURIDAD Y SALUD EN EL TRABAJO</td>
            </tr>
        </table>
        <br>
        <h4 class="titulo">DECLARACIÓN DE ACEPTACIÓN DEL REGLAMENTO INTERNO DE SEGURIDAD  Y SALUD EN EL TRABAJO</h4>
        <br>
        <p>
            Yo, <b>{{ $trabajador->nombre_completo }}</b>, identificado con DNI N° <b>{{ $trabajador->rut }}</b>, desempeñándome en el cargo de <b>{{ $contrato->oficio->name }}</b>, declaro que desarrollare mis labores en forma segura, comprometiéndome a cumplir y acatar todas las normativas y procedimientos de Seguridad y Salud en el Trabajo establecidas por la Empresa en el presente Reglamento y demás directivas o políticas internas; siendo esto condición imprescindible para mi permanencia en la Empresa.
        </p>
        <p>
            Asimismo, declaro que me regiré por los procedimientos mencionados de Seguridad y Salud en el Trabajo y las normas que sobre el tema se han dictado y se dicten en adelante; adecuando mi desempeño laboral a una conducta segura e higiénica, y de respeto hacia mis compañeros de trabajo, jefes, clientes, comunidad y medio ambiente. Cualquier incumplimiento de las normas y procedimientos establecidos en SOCIEDAD AGRICOLA RAPEL S.A.C., me obligará a someterme a las sanciones establecidas en el Reglamento Interno de Seguridad y Salud en el Trabajo, y demás normas internas de la Empresa., las cuales conozco y acato en su totalidad.
        </p>
        <p>
            Finalmente,  declaro  haber recibido un ejemplar del Reglamento Interno de Seguridad y Salud en el Trabajo, así también declaro haberlo leído cuidadosamente y me comprometo a darle estricto cumplimiento.
        </p>
        <p>
            Dejo presente que dicho ejemplar me fue entregado en forma gratuita.
        </p>
        <p style="margin-top: 80px; text-align: right">
            <b>El Papayo, {{ $contrato->fecha_larga }}</b>
        </p>
        <table style="width: 100%; font-weight: bold; margin-top: 70px; text-align: center">
            <tr>
                <td>
                    <div style="border: 1px solid black; width: 100px; height: 140px; margin: auto;"></div>
                </td>
                <td>
                    <div style="width: 100px; height: 140px;"></div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">HUELLA DIGITAL <br> (INDICE DERECHO)</td>
                <td style="width: 50%">_______________________________<br>FIRMA DEL TRABAJADOR <br> DNI/CE: {{ $trabajador->rut }}</td>
            </tr>
        </table>
    </section>

    <div class="page-break"></div>

    <section id="page13">
        <table>
            <tr>
                <td style="vertical-align: center"><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="70px" /></td>
                <td style="font-size: 14px; vertical-align: bottom">REGLAMENTO INTERNO DE SEGURIDAD Y SALUD EN EL TRABAJO</td>
            </tr>
        </table>
        <br>
        <h4 class="titulo">RADIACIÓN ULTRAVIOLETA</h4>
        <br>
        <p>
            Yo, <b>{{ $trabajador->nombre_completo }}</b>, identificado con DNI N° <b>{{ $trabajador->rut }}</b>, desempeñándome en el cargo de <b>{{ $contrato->oficio->name }}</b>, declaro haber recibido instrucción e información sobre la Guía para el cumplimiento legal de la Ley Nº 30102, “LEY QUE DISPONE MEDIDAS PREVENTIVAS CONTRA LOS EFECTOS NOCIVOS PARA LA SALUD POR LA EXPOSICIÓN PROLONGADA A LA RADIACIÓN SOLAR”, indicándome los riesgos específicos de exposición laboral a radiación UV de origen solar y sus medidas de control en los siguientes términos: “la exposición excesiva y/o acumulada de radiación ultravioleta produce efectos dañinos a corto y largo plazo, principalmente en ojos y piel que van desde quemaduras solares, queratitis actínica y alteraciones de la respuesta inmune hasta foto envejecimiento, tumores malignos de piel y cataratas a nivel ocular”, en los siguientes términos:
        </p>
        <ol>
            <li>Efectos en la salud por exposición a radiación UV.</li>
            <li>Expuestos y puestos de trabajo en riesgo dentro de la empresa.</li>
            <li>Medidas de control y de protección personal</li>
            <li>Concientización sobre la correcta utilización y cuidados de los elementos de protección personal</li>
        </ol>
        <p style="margin-top: 80px; text-align: right">
            <b>El Papayo, {{ $contrato->fecha_larga }}</b>
        </p>
        <table style="width: 100%; font-weight: bold; margin-top: 70px; text-align: center">
            <tr>
                <td>
                    <div style="border: 1px solid black; width: 100px; height: 140px; margin: auto;"></div>
                </td>
                <td>
                    <div style="width: 100px; height: 140px;"></div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%">HUELLA DIGITAL <br> (INDICE DERECHO)</td>
                <td style="width: 50%">_______________________________<br>FIRMA DEL TRABAJADOR <br> DNI/CE: {{ $trabajador->rut }}</td>
            </tr>
        </table>
    </section>

    <div class="page-break"></div>

    <section id="page14">
        <table>
            <tr>
                <td style="vertical-align: center"><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="70px" /></td>
                <td style="font-size: 14px; vertical-align: bottom">REGLAMENTO INTERNO DE SEGURIDAD Y SALUD EN EL TRABAJO</td>
            </tr>
        </table>
        <br>
        <h4 class="titulo">POLÍTICA DE SEGURIDAD Y SALUD EN EL TRABAJO</h4>
        <div style="font-size: 14px">
            <p>
                SOCIEDAD AGRÍCOLA RAPEL SAC; empresa dedicada al cultivo, procesamiento y comercialización de uva de mesa, reconoce que el capital humano constituye lo más importante para la organización, por tal motivo se compromete a:
            </p>
            <ol>
                <li>
                    Proteger la integridad y la salud de todos los trabajadores, proveedores, clientes y visitantes que laboren o ingresen en cualquiera de nuestras instalaciones; ejecutando los planes, programas y medidas de prevención destinadas a prevenir accidentes y enfermedades ocupacionales.
                </li>
                <li>
                    Promover una cultura preventiva, basada en la identificación de los peligros y evaluación los riesgos determinando las medidas de control orientadas a eliminar o minimizar los impactos a la seguridad y salud de nuestros colaboradores.
                </li>
                <li>
                    Cumplir las normas legales, las normas técnicas de adhesión voluntaria, convenios de negociación colectiva y otros requisitos relativos a la seguridad y salud en el trabajo suscritos por nuestra empresa.
                </li>
                <li>
                    Garantizar la comunicación y consulta a los trabajadores y sus representantes, así como su capacitación, información y participación activa en el Sistema de Gestión de Seguridad y Salud en el Trabajo de acuerdo a lo estipulado en la legislación nacional.
                </li>
                <li>
                    Implementar y mejorar continuamente el Sistema de Gestión de Seguridad y Salud en el Trabajo e integrarlo a los demás sistemas desarrollados en la Empresa.
                </li>
            </ol>
            <br>
            <table class="tabla" style="width: 80%; margin-left: 20px">
                <tbody>
                    <tr>
                        <td>Nombre:</td>
                        <td>{{ $trabajador->nombre }}</td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td>{{ $trabajador->apellidos }}</td>
                    </tr>
                    <tr>
                        <td>Cargo:</td>
                        <td>{{ $contrato->oficio->name }}</td>
                    </tr>
                    <tr>
                        <td>DNI N°:</td>
                        <td>{{ $trabajador->rut }}</td>
                    </tr>
                    <tr>
                        <td>Fecha:</td>
                        <td>{{ $contrato->fecha_larga }}</td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 100%; font-weight: bold; margin-top: 70px; text-align: center">
                <tr>
                    <td>
                        <div style="border: 1px solid black; width: 100px; height: 140px; margin: auto;"></div>
                    </td>
                    <td>
                        <div style="width: 100px; height: 140px;"></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%">HUELLA DIGITAL <br> (INDICE DERECHO)</td>
                    <td style="width: 50%">_______________________________<br>FIRMA DEL TRABAJADOR <br> DNI/CE: {{ $trabajador->rut }}</td>
                </tr>
            </table>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page15">
        <table>
            <tr>
                <td style="vertical-align: center"><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="70px" /></td>
                <td style="font-size: 14px; vertical-align: bottom">REGLAMENTO INTERNO DE SEGURIDAD Y SALUD EN EL TRABAJO</td>
            </tr>
        </table>
        <h4 class="titulo">COMPROMISO</h4>
        <div style="font-size: 12px">
            <p>
                Considerando que todos los que trabajamos en Sociedad Agrícola Rapel S.A.C., compartimos como valor  fundamental el respeto por la vida y la seguridad de las personas, lo que debiera manifestarse en una permanente actitud de auto cuidado, y teniendo plena conciencia del dolor que provocan en nosotros los accidentes, en especial si sus consecuencias son fatales, me comprometo a
            </p>
            <ol>
                <li>
                    Que ninguna meta productiva o contingencia operacional exponga a mis compañeros o a mi persona a riesgos no suficientemente controlados.
                </li>
                <li>
                    Cumplir la normativa, los reglamentos y los procedimientos de trabajo que se han hecho para proteger nuestras vidas.
                </li>
                <li>
                    Analizar al inicio de cada trabajo los riesgos que tiene asociados y las medidas de control, para asegurar la ejecución del trabajo, evitar accidentes y para proteger el medio ambiente
                </li>
                <li>
                    Informar las condiciones inseguras que pudieran existir en los lugares donde desarrollo mis actividades y hacer lo que esté a mi alcance para eliminarlas y/o controlarlas
                </li>
                <li>
                    Participar activamente en los planes y programas que se implementen para fomentar en nosotros una conducta segura y responsable.
                </li>
            </ol>

            <p>
                Los principios antes mencionados se traducen en acciones concretas que tendré presente y guiarán mi trabajo en todo momento, según corresponda, comprometiendo SIEMPRE a:
            </p>

            <ul>
                <li>Usar correctamente los elementos de protección personal. </li>
                <li>Operar sólo los equipos para los cuales estoy autorizado. </li>
                <li>Intervenir o permitir intervenir solo equipos que estén des energizados y bloqueados. </li>
                <li>Trabajar con equipos, materiales y herramientas en buen estado. </li>
                <li>Cuidar  obedecer  las señalizaciones y los dispositivos de seguridad diseñados para protegerme. </li>
                <li>Ubicarme fuera del alcance de equipos en movimiento y fuentes de energía. </li>
                <li>Conducir atento a las condiciones del tránsito y a una velocidad razonable y prudente. </li>
            </ul>

            <p>
                El compromiso que aquí suscribo voluntariamente, expresa mi firme decisión de proteger mi integridad física y mi vida, así como la de mis compañeros de trabajo. Constituyendo además un incentivo para que todos los que trabajamos en esta Empresa; ejecutivos, profesionales, supervisores y trabajadores, continuemos cumpliendo nuestras obligaciones en materia de prevención de riesgos por nuestro propio bienestar y el de nuestras familias
            </p>

            <table class="tabla" style="width: 80%; margin-left: 20px">
                <tbody>
                    <tr>
                        <td>Nombre:</td>
                        <td>{{ $trabajador->nombre }}</td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td>{{ $trabajador->apellidos }}</td>
                    </tr>
                    <tr>
                        <td>Cargo:</td>
                        <td>{{ $contrato->oficio->name }}</td>
                    </tr>
                    <tr>
                        <td>DNI N°:</td>
                        <td>{{ $trabajador->rut }}</td>
                    </tr>
                    <tr>
                        <td>Fecha:</td>
                        <td>{{ $contrato->fecha_larga }}</td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 100%; font-weight: bold; margin-top: 70px; text-align: center">
                <tr>
                    <td>
                        <div style="border: 1px solid black; width: 100px; height: 140px; margin: auto;"></div>
                    </td>
                    <td>
                        <div style="width: 100px; height: 140px;"></div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%">HUELLA DIGITAL <br> (INDICE DERECHO)</td>
                    <td style="width: 50%">_______________________________<br>FIRMA DEL TRABAJADOR <br> DNI/CE: {{ $trabajador->rut }}</td>
                </tr>
            </table>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page16" style="font-size: 13px">
        <span>
            <table class="tabla" style="width: 100%; text-align: center">
                <tr>
                    <td><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="80px" /></td>
                    <td><b>CARTA COMPROMISO</b></td>
                    <td>Cap - 01 REM <br> Versión: 0.1 <br> Fundo: El Papayo</td>
                </tr>
            </table>
        </span>
        <h4 class="titulo">CARTA DE COMPROMISO PERSONAL EN EL CAMPO Y PACKING </h4>
        <p>Relator (es): <b>SALAZAR CAMPOS KARLA MAGALY</b></p>
        <p>
            COMO PERSONAL DEL FUNDO NOS ENCONTRAMOS ENTRENADOS E INFORMADOS CON LAS BUENAS PRACTICAS AGRICOLAS (BPA) Y BUENAS PRACTICAS DE MANOFACTURA (BPM) QUE CONSTA EN NORMAS DE HIGIENE Y  HABITOS PARA LA SEGURIDAD DEL PERSONAL Y LOS ALIMENTOS. NOS COMPROMETEMOS A CUMPLIR LAS NORMAS ESTABLECIDAS Y MENCIONADAS EN ESTAS CHARLAS. NOS ENCONTRAMOS INSTRUIDOS PARA PREVENIR RIESGOS EN EL TRABAJO Y PARA DAR AVISO EN CASO DE ACCIDENTE O ENFERMEDAD, CUALQUIERA EVENTUALIDAD DEBERÉ DAR AVISO A MI SUPERVISOR O JEFE DIRECTO PARA QUE TOME ACCIONES AL RESPECTO<br>
            Me comprometo a:
        </p>
        <ul>
            <li>Notificar enfermedad antes de comenzar la faena o ante los primeros síntomas.</li>
            <li><b>Verificar antes de ingresar a un cuartel que no tenga bandera Roja (peligro no entrar por 48 horas), bandera Amarrilla (peligro no comer) y bandera verde (autorizado a cosechar – fruta libre de químicos).</b></li>
            <li>Toda hemorragia debe ser informada a los respectivos supervisores y toda fruta expuesta a sangre debe ser desechada.</li>
            <li>Iniciar turnos de trabajo con MANOS LIMPIAS, UÑAS CORTAS Y SIN BARNIZ. </li>
            <li>El lavado de manos debe realizarse al ingresar a los fundos o inicio de labor, antes y después de ir al baño, antes y después de su refrigerio y en cada cambio de actividad. </li>
            <li>Antes de ingresar a los fundos o área de trabajo se debe pasar por los pediluvios (Cal o Hipoclorito).</li>
            <li>Hacer buen uso de instalaciones sanitarias: Lavarse las manos según el instructivo que aparece impreso en las estaciones de lavado de manos. </li>
            <li>Lavado de manos: humedecer las manos y enjabonar, frotar durante 20 segundos, limpiando entre los dedos, bajo las uñas hasta las muñecas. Enjuagara bajo el chorro de agua hasta retirar todo el jabón, secar con papel, botarlo en basurero. </li>
            <li>DAMAS: cabello tomado, totalmente dentro de la cofia, sin maquillaje, sin joyas (collares, aros, anillos, uñas cortas). </li>
            <li>VARONES: cabello corto, barba rasurada. </li>
            <li>En las instalaciones está PROHIBIDO : Ingresar fruta a los Fundos o Packing, fumar, bebidas alcohólicas, Comer, mascar chicle , escupir , estornudar o toser sobre la fruta.</li>
            <li>Ropa limpia, prohibido el uso de Pantalones cortos y sudaderas y uso de calzado cerrado. </li>
            <li>Es obligación el uso de delantal y/o cotonas  en las instalaciones. </li>
            <li>El personal debe avisar a su supervisor cuando tenga que ir al baño.</li>
            <li>El personal solo puede transitar por las áreas permitidas. </li>
            <li>Uso correcto de basureros según su clasificación (cartón/papel, madera, plásticos, etc.). </li>
            <li>Cuidado del medio Ambiente.</li>
            <li>Toda persona que encuentre material, de valor arqueológico, deberá identificar el lugar y dar aviso de inmediato a aseguramiento de calidad del campo. a su vez este dará aviso al administrador y a autoridades.</li>
        </ul>
        <p><b>TEMAS:</b></p>
        <ul>
            <li>HIGIENE Y HABITOS DEL PERSONAL</li>
            <li>DEBERES, CUIDADOS Y MANEJOS CON LOS ALIMENTOS</li>
            <li>POLITICAS DE LA EMPRESA</li>
            <li>EVALUACION DE RIESGOS</li>
            <li>INSTRUCCIONES PARA LIMPIEZA Y DESINFECCIÓN DE NUESTRA AREA</li>
        </ul>
        <p>
            <b>NUESTRO DEBER ES HACER CUMPLIR LAS NORMAS DE LA EMPRESA<br>
            Estamos en pleno conocimiento de los riesgos típicos de las labores que desempeñaremos en las instalaciones, informado por nuestro Jefe directo y Aseguramiento de calidad.</b>
        </p>
        <div>
            <table style="width: 100%">
                <tr>
                    <td>NOMBRE:</td>
                    <td>{{ $trabajador->apellidos }}, {{ $trabajador->nombre }}</td>
                </tr>
                <tr>
                    <td>FIRMA:</td>
                    <td>______________________________________________________</td>
                </tr>
                <tr>
                    <td>FECHA:</td>
                    <td>{{ $contrato->fecha_larga }}</td>
                </tr>
            </table>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page17"></section>

    <div class="page-break"></div>

    <section id="page18" style="font-size: 12px">
        <table style="width: 100%;">
            <tr>
                <td><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="50px" /></td>
                <td><h4 style="text-align: left" class="titulo">FICHA DE INGRESO Y CONTRATACIÓN</h4></td>
            </tr>
        </table>
        <div style="font-size: 11px">
            <table class="tabla" style="width: 100%">
                <tr>
                    <td>Apellido Paterno:</td>
                    <td colspan="2">{{ $trabajador->apellido_paterno }}</td>
                    <td>Apellido Materno:</td>
                    <td colspan="12">{{ $trabajador->apellido_materno }}</td>
                </tr>
                <tr>
                    <td>Nombres:</td>
                    <td colspan="15">{{ $trabajador->nombre }}</td>
                </tr>
                <tr>
                    <td>DNI:</td>
                    <td colspan="2">{{ $trabajador->rut }}</td>
                    <td>Nacionalidad:</td>
                    <td colspan="12">{{ $trabajador->nacionalidad->name }}</td>
                </tr>
                <tr>
                    <td>Fecha de Nacimiento:</td>
                    <td colspan="2">{{ $trabajador->fecha_format }}</td>
                    <td>Estado Civil:</td>
                    <td colspan="12">{{ $trabajador->estado_civil->name }}</td>
                </tr>
                <tr>
                    <td>Dirección(1)</td>
                    <td colspan="15">{{ $trabajador->direccion }}</td>
                </tr>
                <tr>
                    <td>Departamento:</td>
                    <td>{{ $trabajador->distrito->provincia->departamento->name }}</td>
                    <td>Provincia:</td>
                    <td>{{ $trabajador->distrito->provincia->name }}</td>
                    <td>Distrito:</td>
                    <td colspan="11">{{ $trabajador->distrito->name }}</td>
                </tr>
                <tr>
                    <td>Telf./Celular:</td>
                    <td colspan="2">{{ $trabajador->telefono ?? '' }}</td>
                    <td>Correo Electrónico:</td>
                    <td colspan="12">{{ $trabajador->email ?? '' }}</td>
                </tr>
                <tr>
                    <td>Dirección(2):</td>
                    <td colspan="2"></td>
                    <td>Centro de Costo:</td>
                    <td colspan="12">{{ $contrato->zona_labor->name ?? '' }}</td>
                </tr>
                <tr>
                    <td>Departamento:</td>
                    <td></td>
                    <td>Provincia:</td>
                    <td></td>
                    <td>Distrito:</td>
                    <td colspan="11"></td>
                </tr>
                <tr>
                    <td>Sistema Pensionario:</td>
                    <td></td>
                    <td>Seguro Social:</td>
                    <td>ESSALUD</td>
                    <td>Hijos:</td>
                    <td>SI</td>
                    <td colspan="2"></td>
                    <td>NO</td>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td>Cargo:</td>
                    <td><b>{{ $contrato->oficio->name }}</b></td>
                    <td>Nivel Educativo:</td>
                    <td colspan="2"></td>
                    <td>
                        <small>¿Inst. Educ. del Perú?</small>
                    </td>
                    <td colspan="3">SI</td>
                    <td colspan="7">NO</td>
                </tr>
                <tr>
                    <td>Tipo de Institución Educativa:</td>
                    <td></td>
                    <td>Nombre de Inst. Educ.:</td>
                    <td colspan="2"></td>
                    <td>
                        <small>Régimen</small>
                    </td>
                    <td colspan="3">Pública</td>
                    <td colspan="7">Privada</td>
                </tr>
                <tr>
                    <td>Tiempo Estimado de Contrato</td>
                    <td><b>03 Meses (Periodo de Prueba)</b></td>
                    <td>Carrera</td>
                    <td colspan="2"></td>
                    <td>Año de egreso</td>
                    <td colspan="10"></td>
                </tr>
                <tr>
                    <td>Fecha de Ingreso</td>
                    <td><b>{{ $contrato->fecha_format }}</b></td>
                    <td>Troncal:</td>
                    <td><b>{{ $contrato->troncal->name ?? '' }}</b></td>
                    <td>Ruta:</td>
                    <td colspan="11"><b>{{ $contrato->ruta->name }}</b></td>
                </tr>
                <tr>
                    <td>Tipo de Trabajador:</td>
                    <td>Diario:</td>
                    <td></td>
                    <td>Destajo:</td>
                    <td></td>
                    <td>Mensual</td>
                    <td colspan="10"></td>
                </tr>
                <tr>
                    <td>Tipo de Contratos:</td>
                    <td>Parcial:</td>
                    <td> </td>
                    <td>Indefinido</td>
                    <td colspan="12"> </td>
                </tr>
                <tr>
                    <td>Sueldo Bruto:</td>
                    <td colspan="2"> </td>
                    <td>Sueldo Neto:</td>
                    <td colspan="12"> </td>
                </tr>
                <tr>
                    <td>Horario de Trabajo:</td>
                    <td colspan="2"> </td>
                    <td>Hora:</td>
                    <td colspan="12">6:15 am a 15:15am - 11:00am a 15:00pm</td>
                </tr>
                <tr>
                    <td>En caso de Emergencia, Comunicarse a:</td>
                    <td colspan="2"> </td>
                    <td>Teléf./Celular:</td>
                    <td colspan="12"> </td>
                </tr>
                <tr>
                    <td>Capacitaciones:</td>
                    <td colspan="15">
                        <b>Se realizó charla de Inducción de BPA, Seguridad y Salud Ocupacional, Bienestar Social y Remuneraciones</b>
                    </td>
                </tr>
                <tr>
                    <td>Observaciones varias:</td>
                    <td colspan="15"> </td>
                </tr>
                <br>
                <small>Declaro Bajo Juramento que la información brindada es verdadera y que en caso se determine la falsedad de la misma, será causal de falta grave. </small>
            </table>
            <br><br>
            <table class="tabla" style="width: 80%; text-align: center; margin: auto">
                <tr>
                    <td></td>
                    <td>
                        <img src="{{ public_path() . '/img/Firma-Federico.jpg' }}" style="width: 180px">
                    </td>
                </tr>
                <tr>
                    <td><b>Firma del Trabajador</b></td>
                    <td><b>V°B° Gerente General y/o Recursos Humanos</b></td>
                </tr>
            </table>

            <ul style="list-style: none">
                <li>______ DNI</li>
                <li>______ Certificado Antecedentes Policiales</li>
                <li>______ DNI Esposa</li>
                <li>______ DNI Hijos</li>
                <li>______ Partida/Acta de Matrimonio o Documentación de Convivencia</li>
            </ul>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page18.5"></section>

    <div class="page-break"></div>

    <section id="page19">
        <table style="width: 100%;">
            <tr>
                <td><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="50px" /></td>
                <td><h4 style="text-align: left" class="titulo">FORMATO DE ELECCIÓN DE SISTEMA PENSIONARIO</h4></td>
            </tr>
        </table>
        <div style="font-size: 11px; text-align: justify">
            <ol style="list-style: upper-roman">
                <li>
                    <b><u>DATOS DEL TRABAJADOR</u></b><br>
                    <table style="width: 100%">
                        <tr>
                            <td>1.- APELLIDO PATERNO:</td>
                            <td style="border-bottom: 0.5px solid black"><b>{{ $trabajador->apellido_paterno }}</b></td>
                        </tr>
                        <tr>
                            <td>2.- APELLIDO MATERNO:</td>
                            <td style="border-bottom: 0.5px solid black"><b>{{ $trabajador->apellido_materno }}</b></td>
                        </tr>
                        <tr>
                            <td>3.- NOMBRES:</td>
                            <td style="border-bottom: 0.5px solid black"><b>{{ $trabajador->nombre }}</b></td>
                        </tr>
                        <tr>
                            <td>4.- TIPO DOCUMENTO:</td>
                            <td>
                                <table style="width: 100%">
                                    <tr>
                                        <td><div style="border: 1px black solid; height: 15px; width: 15px;">{{ $trabajador->nacionalidad->code === 'PE' ? 'X' : null }}</div></td>
                                        <td>DNI</td>
                                        <td>N°</td>
                                        <td style="border-bottom: 0.5px solid black; width: 65%">{{ $trabajador->nacionalidad->code === 'PE' ? $trabajador->rut : null }}</td>
                                    </tr>
                                    <tr>
                                        <td><div style="border: 1px black solid; height: 15px; width: 15px;"></div></td>
                                        <td>Carnet Extranjería</td>
                                        <td>N°</td>
                                        <td style="border-bottom: 0.5px solid black; width: 65%"></td>
                                    </tr>
                                    <tr>
                                        <td><div style="border: 1px black solid; height: 15px; width: 15px;"></div></td>
                                        <td>Pasaporte</td>
                                        <td>N°</td>
                                        <td style="border-bottom: 0.5px solid black; width: 65%"></td>
                                    </tr>
                                    <tr>
                                        <td><div style="border: 1px black solid; height: 15px; width: 15px;"></div></td>
                                        <td>Otros</td>
                                        <td>N°</td>
                                        <td style="border-bottom: 0.5px solid black; width: 65%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>5.- SEXO:</td>
                            <td>
                                <table style="width: 40%">
                                    <tr>
                                        <td>
                                            <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;">
                                                {{ $trabajador->sexo === 'M' ? 'X' : null }}
                                            </div>
                                        </td>
                                        <td><b>M</b></td>
                                        <td>
                                            <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;">
                                                {{ $trabajador->sexo === 'F' ? 'X' : null }}
                                            </div>
                                        </td>
                                        <td><b>F</b></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>6.- FECHA DE NACIMIENTO:</td>
                            <td style="border-bottom: 0.5px solid black"><b>{{ $trabajador->fecha_format }}</b></td>
                        </tr>
                        <tr>
                            <td>7.- DOMICILIO:</td>
                            <td style="border-bottom: 0.5px solid black; font-size: 9px"><b>{{ $trabajador->direccion }}</b></td>
                        </tr>
                        <table style="margin-left: 45px">
                            <tr>
                                <td>DISTRITO:</td>
                                <td style="border-bottom: 0.5px solid black"><b>{{ $trabajador->distrito->name }}</b></td>
                            </tr>
                            <tr>
                                <td>PROVINCIA:</td>
                                <td style="border-bottom: 0.5px solid black"><b>{{ $trabajador->distrito->provincia->name }}</b></td>
                            </tr>
                            <tr>
                                <td>DEPARTAMENTO:</td>
                                <td style="border-bottom: 0.5px solid black"><b>{{ $trabajador->distrito->provincia->departamento->name }}</b></td>
                            </tr>
                        </table>
                    </table>
                </li>
                <li>
                    <b><u>DATOS DE LA ENTIDAD EMPLEADORA</u></b><br>
                    <table>
                        <tr>
                            <td>1.- NOMBRE O RAZON SOCIAL:</td>
                            <td style="border-bottom: 0.5px solid black"><b>SOCIEDAD AGRICOLA RAPEL SAC</b></td>
                        </tr>
                        <tr>
                            <td>2.- N° DE RUC:</td>
                            <td style="border-bottom: 0.5px solid black"><b>20451779711</b></td>
                        </tr>
                        <tr>
                            <td>3.- DEPARTAMENTO DEL DOMICILIO FISCAL:</td>
                            <td style="border-bottom: 0.5px solid black"><b>CASERIO EL PAPAYO MZ "O"-CASTILLA-PIURA</b></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <b><u>DATOS DEL VÍNCULO LABORAL</u></b><br>
                    <table>
                        <tr>
                            <td>1.- FECHA DE INICIO DE LA RELACION:</td>
                            <td style="border-bottom: 0.5px solid black"><b>{{ $contrato->fecha_larga }}</b></td>
                        </tr>
                        <tr>
                            <td>2.- REMUNERACIÓN:</td>
                            <td style="border-bottom: 0.5px solid black"><b>S/ 39.19</b></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <b><u>ELECCIÓN DEL SISTEMA PENSIONARIO</u></b><br>
                    <ol>
                        <li>
                            DESEO AFILIARME (Marcar el que corresponda)<br>
                            <ul style="list-style: none">
                                <table>
                                    <tr>
                                        <td>SISTEMA NACIONAL DE PENSIONES</td>
                                        <td>
                                            <div style="border: 1px black solid; height: 15px; width: 15px;"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SISTEMA PRIVADO DE PENSIONES (AFP)</td>
                                        <td>
                                            <div style="border: 1px black solid; height: 15px; width: 15px;"></div>
                                        </td>
                                    </tr>
                                </table>
                                <small>* Si deseas afiliarte al Sistema Privado de Pensiones, llenar los siguientes datos:</small>
                                <div>
                                    <table>
                                        <tr>
                                            <td>Correo Electrónico:</td>
                                            <td>__________________________________</td>
                                        </tr>
                                        <tr>
                                            <td>Teléfono Fijo:</td>
                                            <td>__________________________________</td>
                                        </tr>
                                        <tr>
                                            <td>Teléfono Móvil:</td>
                                            <td>__________________________________</td>
                                        </tr>
                                    </table>
                                    <table style="width: 70%">
                                        <tr>
                                            <td>Envio de estado de cuenta por correo</td>
                                            <td>
                                                <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;"></div>
                                            </td>
                                            <td>SI</td>
                                            <td>
                                                <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;"></div>
                                            </td>
                                            <td>
                                                NO
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </ul>
                        </li>
                        <li>
                            ESTOY ACTUALMENTE AFILIADO (Marcar el que corresponda)<br>
                            <table style="font-weight: bold; margin: auto; width: 50%;">
                                <tr>
                                    <td>
                                        <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;"></div>
                                    </td>
                                    <td>INTEGRA</td>
                                    <td>
                                        <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;"></div>
                                    </td>
                                    <td>PRIMA</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;"></div>
                                    </td>
                                    <td>PROFUTURO</td>
                                    <td>
                                        <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;"></div>
                                    </td>
                                    <td>HABITAT</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;"></div>
                                    </td>
                                    <td>HORIZONTE</td>
                                    <td>
                                        <div style="border: 1px black solid; height: 15px; width: 15px; margin: auto;"></div>
                                    </td>
                                    <td>O.N.P.</td>
                                </tr>
                            </table>
                        </li>
                    </ol>
                </li>
            </ol>
            <small>
                DECLARO HABER RECIBIDO EL BOLETIN INFORMATIVO SOBRE LAS CARACTERÍSTICAS, DIFERENCIAS Y DEMÁS PECULIARIDADES PERNSIONARIOS VIGENTES SPP - SNP.
            </small>
            <br><br><br>
            <table style="width: 100%">
                <tr>
                    <td style="text-align: right; font-size: 12px">
                        <b>Firma del trabajador</b>
                    </td>
                    <td style="border-bottom: 0.5px solid black">

                    </td>
                </tr>
                <tr>
                    <td><b>RR.HH. - {{ $contrato->anio_contrato }}</b></td>
                    <td style="text-align: right">Piura, {{ $contrato->fecha_larga }}</td>
                </tr>
            </table>
            <small>{{ $trabajador->rut }}</small>
        </div>
    </section>

    <div class="page-break"></div>

    <section id="page20"></section>

    <div class="page-break"></div>

    <section id="page21">
        <table style="width: 100%;">
            <tr>
                <td><img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="50px" /></td>
                <td style="text-align: right;"><small>Código: FG-SSO-01<br>Revisión: 00</small></td>
            </tr>
        </table>

        <h4 class="titulo">PROGRAMA DE INDUCCIÓN PARA PERSONAL NUEVO O TRANSFERIDO</h4>

        <h4 style="text-align: center">Hoja de Ruta para Trabajadores Nuevos</h4>

        <table class="tabla" style="font-size: 14px; width: 80%; margin: auto">
            <tr style="height: 200px;">
                <td style="width: 50%">
                    <b>Apellidos y Nombres:</b><br>
                    <span>{{ $trabajador->apellidos }}, {{ $trabajador->nombre }}</span>
                </td>
                <td>
                    <b>Fecha de Ingreso:</b><br>
                    <span>{{ $contrato->fecha_larga }}</span>
                </td>
            </tr>
            <tr style="height: 200px">
                <td>
                    <b>Puesto de Trabajo:</b><br>
                    <span>{{ $contrato->oficio->name }}</span>
                </td>
                <td>
                    <b>Firma:</b><br>
                    <span> </span>
                </td>
            </tr>
        </table>
        <br><br>

        <div style="font-size: 14px">
            <table style="width: 90%; margin: auto">
                <tr>
                    <td>
                        <b>Recursos Humanos/Administración</b><br>
                        <small>Nombre del Instructor: </small>
                    </td>
                    <td>
                        <img src="{{ public_path() . '/img/firma-olga-vilela.png'}}" width="200px" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>VILELA LUDEÑA OLGA STEFFANA</b>
                    </td>
                    <td style="border-bottom: 1px solid black; width: 50%"></td>
                </tr>
                <tr>
                    <td>
                        <b>Seguridad y Salud en el Trabajo</b><br>
                        <small>Nombre del Instructor: </small>
                    </td>
                    <td>
                        <img src="{{ public_path() . '/img/firma-jose-reyes.png'}}" width="100px" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>REYES TINOCO JOSE LENIN</b>
                    </td>
                    <td style="border-bottom: 1px solid black; width: 50%"></td>
                </tr>
                <tr>
                    <td>
                        <b>BPA</b><br>
                        <small>Nombre del Instructor: </small>
                    </td>
                    <td>
                        <img src="{{ public_path() . '/img/firma-karla-salazar.png'}}" width="200px" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>SALAZAR CAMPOS KARLA MAGALY</b>
                    </td>
                    <td style="border-bottom: 1px solid black; width: 50%"></td>
                </tr>
                <tr>
                    <td>
                        <b>Jefe de Campo</b><br>
                        <small>Nombre del Instructor: </small>
                    </td>
                    <td>
                        <img src="{{ public_path() . '/img/firma-remo-galindo.png'}}" width="100px" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>GALINDO CARRION REMO YUNIOR</b>
                    </td>
                    <td style="border-bottom: 1px solid black; width: 50%"></td>
                </tr>
            </table>

            <ol>
                <li>
                    <b>Recursos Humanos/Administración</b><br>
                    Puntos a considerar:
                    <ul>
                        <li>Giro o actividad principal de la Empresa  y sus principales clientes</li>
                        <li>Reseña Histórica de la Empresa</li>
                        <li>Filosofía de la Empresa: Misión, Visión y valores organizacionales</li>
                        <li>Planillas, Horarios Laborales, Boletas y Beneficios Sociales (días de descanso, días de pago, prestaciones de servicio personal, etc.)</li>
                        <li>Organigrama y Departamentalización</li>
                        <li>Reglamento Interno del Trabajador</li>
                        <li>Medidas Disciplinarias</li>
                    </ul>
                </li>
                <li>
                    <b>INDUCCIÓN GENERAL EN SEGURIDAD Y SALUD EN EL TRABAJO.</b><br>
                    Puntos a considerar:
                    <ul>
                        <li>Importancia del trabajador en el Sistema de Gestión de SST.</li>
                        <li>Reglamento Interno de Seguridad y Salud en el Trabajo.</li>
                        <li>Políticas de SST, Deberes y Derechos.</li>
                        <li>Reglas Generales de SST de acuerdo a la identificación de Peligros y evaluación de Riesgos, reporte, investigación y elaboración de informes de incidentes accidentes de SST. </li>
                        <li>Equipos de protección personal y equipo de protección colectivo: uso y mantenimiento. </li>
                        <li>Orden y Limpieza.</li>
                        <li>Comentarios generales de Primeros auxilios</li>
                    </ul>
                </li>
                <li>
                    <b>BPA</b><br>
                    <ul>
                        <li>Inocuidad </li>
                        <li>Manipulación de producto en pre recolección (introducción especial</li>
                        <li>Cuidado del Medio Ambiente y conservación. </li>
                        <li>Gestión de Residuos y contaminantes, reciclaje y reutilización (introducción especial). </li>
                        <li> Fertilización, fertirrigación y Riego (Salud, Seguridad y bienestar del trabajador). </li>
                        <li>Mejora del sistema de calidad </li>
                    </ul>
                </li>
                <li>
                    <b>JEFE DE CAMPO/SUPERVISOR </b><br>
                    Puntos a considerar:
                    <ul>
                        <li>Explicación de las expectativas del Jefe o Supervisor inmediato</li>
                        <li> Identificación de Peligros y Evaluación de Riesgos en su área del trabajo</li>
                    </ul>
                </li>
                <li>
                    <b>ALMACEN</b><br>
                    Entrega de Equipos de Protección personal
                    <ul>
                        <li>Casco de seguridad <span></span></li>
                        <li>Zapatos de seguridad <span></span></li>
                        <li>Guantes de seguridad <span></span></li>
                        <li>Tapones auditivos/Orejeras <span></span></li>
                        <li>Respirador <span></span></li>
                        <li>Lentes de Seguridad <span></span></li>
                    </ul>
                </li>
            </ol>
            <br>
            <div style="text-align: center">
                <p style="font-weight: bold">
                    _____________________________<br>
                    {{ $trabajador->nombre_completo }}<br>
                    DNI: {{ $trabajador->rut }}
                </p>
            </div>
        </div>
    </section>

    <div class="page-break"></div>

    <section>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <br /><br /><br /><br /><br /><br /><br /><br /><br />
        <div style="text-align: center">
            _______________________________<br />
            <b>{{ $trabajador->nombre_completo }}</b><br />
            <b>DNI: {{ $trabajador->rut }}</b>
        </div>
    </section>


    <div class="page-break"></div>

    <div class="page-break"></div>

    <section id="page22">
        <img src="{{ public_path() . '/img/Logo Documentos2.jpg'}}" width="50px" />
        <h4 class="titulo">MEMORÁNDUM N° 001-{{ $contrato->anio_contrato }}-G.GRAL./RAPEL </h4>
        <br>
        <div style="font-size: 14px;">
            <table style="font-weight: bold">
                <tr>
                    <td>A:</td>
                    <td>TODO EL PERSONAL</td>
                </tr>
                <tr>
                    <td>DE:</td>
                    <td>GERENCIA GENERAL</td>
                </tr>
                <tr>
                    <td>ASUNTO:</td>
                    <td>ENTREGA DE BOLETA DIGITAL</td>
                </tr>
                <tr>
                    <td>FECHA:</td>
                    <td>{{ strtoupper($contrato->fecha_larga) }}</td>
                </tr>
            </table>
            <br>
            <hr>
            <br>
            <p>
                Por medio de la presente, tenemos a bien a comunicarnos con usted con la finalidad de informarle lo siguiente:
            </p>

            <p>
                Que en ejercicio de nuestro poder de dirección y al amparo de lo que establece el artículo 3° numeral 3.2° Decreto Legislativo Nº 1310, Decreto Legislativo que aprueba medidas adicionales de simplificación administrativa y demás normas complementarias; a partir del mes de {{ $contrato->mes_contrato }}, La Empresa realizará la entrega de sus boletas de pago de remuneraciones en forma digital, las cuales pondremos a su disponibilidad a través de la Plataforma <b>“rapel.turecibo.com”</b>.
            </p>

            <p>
                Las boletas de pago serán puestas a su disposición en la plataforma virtual, de manera mensual, a más tardar el tercer día hábil siguiente a la fecha de pago de la remuneración, siendo su obligación acusar recibo de la boleta de pago en la plataforma virtual dentro del día hábil siguiente de recibida. En caso de incumplimiento de esta obligación, la Empresa podrá aplicar las sanciones disciplinarias que considere pertinentes.
            </p>

            <p>
                Asimismo, le informamos que para poder acceder a la plataforma en mención, el área de Recursos Humanos le hará entrega de su usuario y clave en el desglosable de este documento.
            </p>

            <p>Atentamente,</p>
            <br>

            <img src="{{ public_path() . '/img/PostFirma - Daniel E  RAPEL SAC.jpg'}}" width="200px" />

            <br><br><br>

            <div style="font-weight: bold;">
                _______________________________________________<br>
                Nombre: <span>{{ $trabajador->nombre . ' ' . $trabajador->apellidos }}</span><br>
                DNI: <span>{{ $trabajador->rut }}</span><br>
                Fecha de recepción: {{ $contrato->fecha_larga }}
            </div>
            <br>
            <hr>
            <br>
            <div>
                <div>
                    <span style="font-weight: bold; background: gray">USUARIO: {{ $trabajador->rut }}</span> <br>
                    <span style="font-weight: bold; background: gray">CLAVE: {{ $trabajador->fecha_format }}</span>
                </div>
                <div>
                    <b>RECUERDA:</b> La primera vez que ingreses, deberás cambiar la contraseña por una de tu elección y de fácil recordación. Como mínimo debe tener 8 dígitos. <u>No olvides firmar tu boleta, es tu obligación</u>. Para cualquier consulta, acércate a la oficina de Recursos Humanos de tu fundo. <br> <b>Página Web:</b> rapel.turecibo.com
                </div>
            </div>

        </div>

    </section>

    <div class="page-break"></div>

@endsection
