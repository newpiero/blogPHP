
<div class="form">


<form method="post" class="addArcticle">
  <br>
  <br>
    <select name="id_category">
        <? foreach ($categories as $category): ?>
         <option value="<?=$category['id_category']?>"
                 <?=($category['id_category'] == $fields['id_category'] ? 'selected=' : '')?>
         >
           <?=$category['name']?>
         </option>
        <? endforeach; ?>
    </select>
    <br>  <br>
  <br>
  <input type="text" name="title" placeholder="Введите заголовок" value="<?=$fields['title']?>">
  <br>
  <br>
  <br>
  <textarea type="text" name="content" placeholder="Введите содержание статьи" ><?=$fields['content']?></textarea>
  <br>
  <br>
  <br>
  <button type="submit">send new article</button>
  <div class="error">
   <? foreach ($validateErrors as $error): ?>

   <p><?=$error?></p>

  <? endforeach; ?>

  </div>
</form>

    <a href="/">Move to main page</a>

