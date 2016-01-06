<div class="row">
    <div class="col-sm-3">
        <h2>Категории</h2>
        <ul>
            <?php
            if(!empty($cat)){
                foreach($cat as $value){
                    echo "<li>";
                    echo "<a href='/blog/cat/".$value['id']."'>".$value['name']."</a>";
                    echo "</li>";
                }

            }else{
                echo "<li>Записей нет!</li>";
            }

            ?>
        </ul>
    </div>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center">
                    <?php echo $post->title;?>
                </h2>
                <p> <?php echo $post->discription;?></p>
            </div>
            <div class="col-sm-12">
                <h3>Коментарии</h3>
                <?php
                    if(!empty($comment)){
                        echo $comment;
                    }else{
                        echo "Коментариев нет!";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

