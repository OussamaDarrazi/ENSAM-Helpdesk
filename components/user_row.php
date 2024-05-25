<?php
?>
<tr>
  <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800'>
  <?=$user->id?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800'>
  <span class=" inline-flex items-center size-2.5 rounded-full text-xs font-medium 
   
   <?php if($user->isActive){echo "bg-teal-500";}else{echo "bg-red-500";};?>
    text-white">
  </span>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-ellipsis'>
    <?=$user->first_name?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>

  <?=$user->last_name?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
  <?=$departments[$user->department_id]["dept_name"]?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
  <?=$user->email?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
  <?=$user->phone_number?>
  </td>
  <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-800'>
  <form action="post">
    <input type="hidden" name="ticket_id" value="">
    
    <select 
    hx-post="change_user_type.php?user_id= <?=$user->id?>" 
    hx-swap="none"
    name="usertype" 
    id="usertype" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
        <option value="0" 
        <?php if ($user->user_type == UserType::EMPLOYE) {echo "selected"; }?>
        >Employé</option>
        <option value="1"
        <?php if ($user->user_type == UserType::HELPDESK) {echo "selected"; }?>
        >Helpdesk</option>
      </select>
    </form>
  </td>

</tr>