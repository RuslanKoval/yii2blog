
<div class="row">
    <div class="col-sm-3">
        <h2>Категории</h2>
        <ul>
            <?php
            use yii\widgets\LinkPager;
            use yii\widgets\ListView;

            if(!empty($cat)){
                foreach($cat as $value){
                    echo "<li>";
                    echo "<a href='/blog/cat/".$value['id']."'>".$value['name']."</a>";
                    echo "</li>";
                }

            }else{
                echo "<li>Записей нет!</li>";
            }

            ?>use yii\widgets\ListView;

        </ul>

    </div>
    <div class="col-sm-8">
        <?php
        if(!empty($post)){
            foreach ($post as $model) {
                echo "<div class='row'>";
                echo "<h1><a href='/blog/post/".$model->id."'>".$model->title."</h1></a>";
                echo "<p>".$model->discription."</p>";
                echo "</div>";
            }
        }else{
            echo "Записей нет!";
        }

        // display pagination
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);



            ?>


    </div>
</div>
