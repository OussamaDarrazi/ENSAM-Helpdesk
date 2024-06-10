<table id="ticket_table" class='max-w-full divide-y divide-gray-200 '>
    <thead class='sticky top-0 bg-gray-50'>
      <tr>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'># Ticket</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Sujet</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Statut</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Categorie</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Helpdesk</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Crée par</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Crée à</th>
        <th scope='col' class='px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase'>Dernier MàJ à</th>
      </tr>
    </thead>
    <tbody class='divide-y divide-gray-200 overflow-y-scroll '>
      <?php
      foreach($tickets as $ticket){
        include("ticket_row.php");
      }?>
</tbody>
  </table>

