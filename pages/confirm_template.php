<div class="min-w-screen min-h-screen bg-gray-100  flex flex-col justify-center items-center">

<div class="min-w-fit w-1/3 bg-white border border-gray-200  rounded-xl shadow-sm">
  <div class="p-4 sm:p-7">
    <div class="text-center">
      <h1 class="block text-2xl font-bold text-gray-800">Activer votre compte.</h1>
      <p class="mt-2 text-sm text-gray-600">
        Veuillez tappez le pin envoyé à <span class="font-bold"><?=$email?></span> à fin d'activer votre compte.
      </p>
    </div>

    <div class="mt-5">
      <!-- Form -->
      <form method="post">
        <div class="grid gap-y-4">
          <!-- Form Group -->
          <div class="flex space-x-3 justify-evenly" data-hs-pin-input="">
  <input name="digit-1" type="text" class="block w-20 text-3xl aspect-square text-center border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="⚬" data-hs-pin-input-item="">
  <input name="digit-2" type="text" class="block w-20 text-3xl aspect-square text-center border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="⚬" data-hs-pin-input-item="">
  <input name="digit-3" type="text" class="block w-20 text-3xl aspect-square text-center border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="⚬" data-hs-pin-input-item="">
  <input name="digit-4" type="text" class="block w-20 text-3xl aspect-square text-center border-gray-200 rounded-md  focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="⚬" data-hs-pin-input-item="">

</div>
          <!-- End Form Group -->

          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Activer mon compte</button>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>
</div>
<a class="pe-3.5 inline-flex items-center gap-x-2 text-sm text-gray-600 decoration-2 hover:underline hover:text-blue-600 " href="./signup.php">
      <svg class="size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M11.2792 1.64001L5.63273 7.28646C5.43747 7.48172 5.43747 7.79831 5.63273 7.99357L11.2792 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
      </svg>
      Revenir à la page d'inscription
    </a>
</div>