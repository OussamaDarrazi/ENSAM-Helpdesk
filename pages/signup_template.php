
<div class="relative overflow-hidden min-h-screen">
  <div class="mx-auto min-h-screen max-w-screen-md py-auto px-4 sm:px-6 md:max-w-screen-xl md:px-8 content-center items-center">
    <div class="md:pe-8 md:w-1/2 xl:pe-0 xl:w-5/12">
      <!-- Title -->
      <h1 class="text-3xl text-gray-800 font-bold md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight">
        Services de support <span class="italic"><span class="text-blue-600">ENSAM</span> Helpdesk</span>.
      </h1>
      <p class="mt-3 text-base text-gray-500">
      Inscrivez-vous maintenant pour bénéficier des nos services d'assistance.
      </p>
      <!-- End Title -->
      <!-- Form -->
      <form method="post" class="my-5">
        <div class="mb-4">
          <label for="hs-hero-first-name-2" class="block text-sm font-medium"><span class="sr-only">Prenom
              </span></label>
          <input name="first-name" type="text" id="hs-hero-first-name-2"
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Prenom">
        </div>
        <div class="mb-4">
          <label for="hs-hero-last-name-2" class="block text-sm font-medium"><span class="sr-only">Nom</span></label>
          <input name="last-name" type="text" id="hs-hero-last-name-2"
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Nom">
        </div>
        <div class="mb-4">
          <div class="relative">
            <select name="department" class="peer p-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-6 autofill:pb-2">
              <?php
              foreach ($departments as $department) {
                echo '<option value="' . $department["dept_id"] . '">' . $department["dept_name"] . '</option>';

              } ?>
            </select>
            <label class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent  peer-disabled:opacity-50 peer-disabled:pointer-events-none
    peer-focus:text-xs
    peer-focus:-translate-y-1.5
    peer-focus:text-gray-500 
    peer-[:not(:placeholder-shown)]:text-xs
    peer-[:not(:placeholder-shown)]:-translate-y-1.5
    peer-[:not(:placeholder-shown)]:text-gray-500">Departement</label>
          </div>
        </div>
        <div class="mb-4">
          <label for="hs-hero-email-2" class="block text-sm font-medium"><span class="sr-only">Adresse mail
              </span></label>
          <input name="email" type="email" id="hs-hero-email-2"
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Adresse mail">
        </div>

        <div class="mb-4">
          <label for="hs-hero-password-2" class="block text-sm font-medium"><span
              class="sr-only">Mot de passe</span></label>
          <input name="password" type="password" id="hs-hero-password-2"
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Mot de passe">
        </div>

        <div class="grid">
          <button type="submit"
            class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">S'inscrire</button>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>

  <div
    class="hidden md:block md:absolute md:top-0 md:start-1/2 md:end-0 h-full bg-[url('images/hero-section-bg.png')] bg-no-repeat bg-right bg-cover">
  </div>
  <!-- End Col -->
</div>