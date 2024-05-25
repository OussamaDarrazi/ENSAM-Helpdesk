<table class='max-w-full divide-y divide-gray-200 '>
    <thead class='sticky top-0 bg-gray-50'>
      <tr>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'># ID</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Active</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Prenom</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Nom</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Departement</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Adresse mail</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Telephone</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Type</th>
      </tr>
    </thead>
    <tbody class='divide-y divide-gray-200 overflow-y-scroll '>
      <?php
      foreach($users as $user){
        include("user_row.php");
      }
        ?>
</tbody>
  </table>