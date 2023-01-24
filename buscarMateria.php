<?php 
require 'database.php';

if(isset($_POST['buscador'])){
    $html="";
    $nomMateria=mysqli_real_escape_string($conexion,$_POST['buscador']); 

    $res=mysqli_query($conexion,"SELECT m.idMateria, m.nomMateria, avg((q1 + q2 + q3 + q4 + q5)/5) as promedio from materiaGrupo mg inner join materias m on m.idMateria = mg.idMateria inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo inner join respuestas r on r.idMateriaAlumno = ma.idMateriaAlumno where nomMateria like '%".$nomMateria."%' group by nomMateria");

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $html.= "<tr class='clickable-row' data-href='vistaMateria.php?idMateria=".$fila['idMateria']."'>";
        $html.= "<th scope=\"row\">".$fila['nomMateria']."</th>";
        $html.= "<td>".$fila['promedio']."</td>";
        $html.= "</tr>";
    }
    mysqli_close($conexion);
    echo $html;

}else{
    echo "Error";
}

?>