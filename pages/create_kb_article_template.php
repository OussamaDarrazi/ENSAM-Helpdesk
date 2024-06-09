<div class="min-w-screen h-screen overflow-hidden bg-gray-100  flex flex-col">
  <?php require 'components/navbar.php'; ?>
  <div class="w-full h-full overflow-hidden flex-grow flex flex-col justify-center items-center">
  <div class="w-3/5 h-fit min-h-96 max-h-full my-4 overflow-hidden bg-white border border-gray-200  rounded-xl shadow-sm flex flex-col justify-center items-center">
    <div class="w-full h-full p-4 sm:p-7 overflow-y-scroll">
    

      <!-- Errors -->
      <?php
      if (!empty($errors)) {
        ?>
        <div class="bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 my-2" role="alert">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="m15 9-6 6"></path>
                <path d="m9 9 6 6"></path>
              </svg>
            </div>
            <div class="ms-4">
              <h3 class="text-sm font-semibold">
                Un problème est survenu lors de la soumission de vos données.
              </h3>
              <div class="mt-2 text-sm text-red-700">
                <ul class="list-disc space-y-1 ps-5">
                  <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <?php
      }
      ?>
      <!-- End Errors -->
      <form method="post" class="h-full">
        <div class="w-full h-full flex flex-col items-center gap-4 ">
        <h1 class="text-xl font-bold text-gray-600 self-start">Nouveau Article</h1>    
        <!-- TITLE AND CATEGORY -->
          <div class="flex gap-4 w-full">
            <input type="text" name="article_title" placeholder="Titre"
          class="basis-2/3 py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        <select name="article_category"
      class="basis-1/3 py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
    <?php foreach ($categories as $category) { ?>
    <option value="<?= $category["category_id"] ?>"><?= $category["category_name"] ?></option>
  </div>
<?php } ?>
</select>
</div>
<!-- END TITLE AND CATEGORY -->
 <!-- WYSIWYG EDITOR -->
<div class="w-full" >
            <textarea id="article_content" name="article_content" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " rows="6"></textarea>
</div>
<div class="flex-grow"></div>
  <!-- END WYSIWYG EDITOR -->       
  <div class="w-full flex justify-end gap-x-2 place-self-end">
                    <a href="<?=$_SERVER['HTTP_REFERER']?>" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                        Annuler
                                </a>
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Enregistrer
                    </button>
                </div>

      </form>
    </div>
  </div>
  </div>

</div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create(document.querySelector('#article_content'), {
      toolbar: [ 'bold',  'italic',  'link', 'blockQuote', '|', 'undo', 'redo' ],
    })
    .catch(error => {
      console.error(error);
    });
</script>