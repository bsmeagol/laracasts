<h1>Projects</h1>

<?php
echo('------------------------<br>');
    foreach($projects as $project)
        {

            echo('<a href="/projects/'.$project->id.'">'.$project->title.'</a><br>');
            echo('------------------------<br>');

        }

    ?>
<br><br>
<a href="/projects/create">Niew</a>
