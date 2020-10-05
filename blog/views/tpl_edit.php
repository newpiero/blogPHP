
<div class="form">




    <h3>Вы редактируете статью "<?=$fields['title']?>"</h3>
    <form method="post" class="editArcticle">
      <br>
      <p>Заголовок статьи</p>
        <select name="id_category">
          <? foreach ($categories as $category): ?>
              <option value="<?=$category['id_category']?>"
                <?=($category['id_category'] == $fields['id_category'] ? 'selected=' : '')?>
              >
                <?=$category['name']?>
              </option>
          <? endforeach; ?>
        </select>
        <input type="text" name="title" placeholder="Введите заголовок" value="<?=$fields['title']?>">

      <br>
      <p>Текст статьи</p>
        <textarea type="text" name="content" placeholder="Введите содержание статьи"><?=$fields['content']?></textarea>
      <br>
      <br><br>
      <button type="submit">save article</button>
        <div class="error">
<!--          --><?// foreach ($validateErrors as $error): ?>
<!---->
<!--              <p>--><?//=$error?><!--</p>-->
<!---->
<!--          --><?// endforeach; ?>

        </div>
    </form>
</div>


<hr>
<a href="/">Move to main page</a>
