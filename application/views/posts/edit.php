<h2><?= $title; ?></h2>
<!-- validation_error(); = This function will return any error messages sent back by the validator. If there are no messages it returns an empty string. -->
<?php echo validation_errors(); ?>

<!--
    Dat wat we hier beneden doen, dus in plaats van <form>, form_open('posts/create') 
    is zeer handig omdat de "action" van het form al door de ('posts/create') de route krijgt
    welk form die moet gebruiken, en ookal de method "post". Om dit te kunnen doen moeten we 
    naar de folder "config/autoload" gaan en bij "$autoload['helper'] = array('url');" alleen nog 'form' toevoegen. 
    als je dat gedaan hebt dan hoort het zo eruit te zien "$autoload['helper'] = array('url', 'form');" 
-->
<?php echo form_open('posts/update'); ?>
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add title" value="<?php echo $post['title']; ?>" />    
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>    
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-secondary">Submit</button>
</form>