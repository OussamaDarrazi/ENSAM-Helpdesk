<div class="min-w-screen min-h-screen bg-gray-100  flex flex-col justify-center items-center">

<div class="min-w-fit w-1/3 bg-white border border-gray-200  rounded-xl shadow-sm">
  <div class="p-4 sm:p-7">
    <div class="text-center">
      <h1 class="block text-2xl font-bold text-gray-800">Évaluez nous!</h1>
      <p class="mt-2 text-sm text-gray-600">
        Comment trouvez vous notre interraction durant votre dernier ticket?</p>
    </div>
<!-- Errors -->
<?php
if (!empty($errors)) {
?>

<div class="bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 my-2" role="alert">
  <div class="flex">
    <div class="flex-shrink-0">
      <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
    <div class="mt-5">
      <!-- Form -->
      <form method="post">
      <div class="flex space-x-2 justify-center items-center my-6">
        <div>
            <input id="hs-ratings-readonly-1" type="radio" class="peer hidden" name="rating" value="1">
            <label for="hs-ratings-readonly-1" class="cursor-pointer px-2 py-1 rounded peer-checked:bg-gray-100 text-xl">😔</label>
        </div>
        <div>
  <input id="hs-ratings-readonly-2" type="radio" class="peer hidden" name="rating" value="2">
  <label for="hs-ratings-readonly-2" class="cursor-pointer px-2 py-1 rounded peer-checked:bg-gray-100 text-xl">😐️</label>
  </div>
  <div>
  <input id="hs-ratings-readonly-3" type="radio" class="peer hidden" name="rating" value="3">
  <label for="hs-ratings-readonly-3" class="cursor-pointer px-2 py-1 rounded peer-checked:bg-gray-100 text-xl">🤩</label>
  </div>
</div>
<div class="w-full mb-6">
  <label for="textarea-email-label" class="sr-only">Feedback</label>
  <textarea id="textarea-email-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " rows="5" placeholder="Merci d'elaborer sur votre choix"></textarea>
</div>
          <!-- End Form Group -->

          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Envoyer</button>
        </div>
      </form>
      <!-- End Form -->
    </div>
</div>
<a class="pe-3.5 inline-flex items-center gap-x-2 text-sm text-gray-600 decoration-2 hover:underline hover:text-blue-600 my-4" href="./index.php">
      <svg class="size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M11.2792 1.64001L5.63273 7.28646C5.43747 7.48172 5.43747 7.79831 5.63273 7.99357L11.2792 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
      </svg>
      Revenir vers le dashboard
    </a>
</div>