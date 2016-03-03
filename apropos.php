<link rel = "stylesheet"  type="text/css"  href = "css/style.css" />
<?php
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'dashboard';
require_once 'view_parts/_page_base.php';
?>
<div id="apropos">
 <fieldset>
    <legend>A propos</legend>
     <div id="ecole">
         <h2>Mon école</h2>
         <p>J'ai fait ma formation à l'école des métiers du Sud-Ouest-de-Montréal.</p>
         <p>J'ai eu la chance de travailler avec des équipements à la fine pointe de la technologie et entourée de personnel qualifié et expérimenté.</p>
         <p>Je remercie tout le corps proffesoral.</p>
     </div>
         <div id="stage">
             <h2>Stage en Égypte</h2>
              <img src="images/stage1.jpg" alt="stage en égypte"/>
             <img src="images/stage2.jpg" alt="Les bijous d'égypte"/>
             <img src="images/stage3.jpg" alt="école de bijouterie"/>
             <p>La beauté se trouve dans la diversité.</p>
             <p>La vie m'a donné la chance de découvrir une école de bijouterie en Egypte. Leurs manières de travailler les matières m'ont vraiment inspirée et m'ont donné envie d'approfondir mes connaissances et de les diversifier.</p>

         </div>
    <div id="demarche">
        <h2>Démarche artistique</h2>
        <p>La transformation guide mon processus créateur ; une matière brute qui se transforme en un élément complexe ; l’évolution des composantes (matériaux) imbriquées à celle des émotions. L’homme change , la matière aussi.</p>
        <p>Longtemps je cherchais mon mode d’expression, je découvris mon confort dans l’imparfait, une zone en constant changement. C’est pourquoi je reproduis des formes simples accompagnées de textures et d’imperfections qui évoluent au fil de créations brutes et imprécises.
        </p>
        <p>Conceptualiser une idée, chercher la raison d’être d’un projet, passer une idée à travers une matière ; voilà où naît la réflexion dans laquelle sont créés mes pièces. Je me dois de transmettre une information à travers un processus de transformation. L’émotion mue par le désir de comprendre ce processus.</p>
        <p>La recherche de l’esthétisme, par la composition harmonieuse des formes et des couleurs, est la base de mon travail. Tel un architecte, j’assemble les formes pour arriver à l’harmonie du produit fini. Je dessine mes pièces sans me soucier des contraintes techniques et ensuite, je trouve le moyen de les réaliser. Je désire explorer toute autre technique que je trouverais inspirante et ainsi, moins me restreindre dans mes créations.</p>
    </div>
     <div id="materiaux">
         <h2>Matériaux</h2>
         <p>J’utilise principalement l’or et l’argent pour leur malléabilité et leur durabilité.
             Le mélange des différents métaux avec la céramique, les perles et/ou les pierres, m’amène aussi à faire une recherche au niveau de la texture, de la forme et de la couleur.</p>
     </div>
     <div id="metjoallier">
         <h2>Métier de joallier</h2>
         <p>En tant que bijoutier, joallier, vous êtes amenés à scier, polir, souder des matériaux afin de concevoir des bijoux.</p>
         <p>Sertir des pierres précieuses et fines, tailler, mouler et couler des bijoux, réaliser en petites séries des pièces de bijouterie, ainsi qu’évaluer sommairement la valeur de certains bijoux et par la suite, en assurer la vente.</p>
         <p>En quelques mots, c'est un métier merveilleux de part sa diversité, sa beauté...</p>
     </div>

 </fieldset>
</div>


<?php
require_once 'view_parts/_page_buttom.php';
?>