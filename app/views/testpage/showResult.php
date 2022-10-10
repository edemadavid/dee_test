<?php
    require APPROOT.'/views/layout/header.php';
?>

<?php 
// $user = $data['user'];


$count = $data['count'];
$answer = $data['answer'];
$answer = $data['answer'];
$choices = $data['choices'];
$test = $data['test'];


$percentage = $data['percentage'];


?>
<!-- <style>
@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
</style>
<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
    <div class="w-full mx-auto rounded-lg bg-white shadow-lg px-5 pt-5 pb-10 text-gray-800" style="max-width: 500px">
       
        <div class="w-full mb-10 p-5">
    
            <p class="text-sm text-gray-600 text-center px-5">You Scored <?php echo $count; ?> out of <?php echo count($choices);?></p>
            
        </div>
        <div class="w-full">
            <p class="text-md text-indigo-500 font-bold text-center">Do Better Bitch!!!</p>
            <p class="text-xs text-gray-500 text-center">Darkpayne</p>
        </div>
    </div>
</div> -->

<div class="flex items-center justify-center h-screen bg-black">
   <div class="bg-white font-semibold text-center rounded-3xl border shadow-lg p-10 max-w-xs">
     <img class="mb-3 w-32 h-32 rounded-full shadow-lg mx-auto" 
        src="
            <?php 
                if (empty($user->photo)) 
                    {echo "https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg";
                } else { echo FILE_ROOT.$profile->photo; } 
            ?>" 
        alt="product designer">
     <h1 class="text-lg text-gray-700"><?php echo $_SESSION["name"] ?></h1>
     <h3 class="text-sm text-gray-400 "> Student </h3>
     <h3 class="text-sm text-gray-400 mt-5"></h3>
     <p class="text-xs text-gray-400">You Scored <?php echo $count; ?> out of <?php echo count($choices);?></p>
     <p class="text-xs text-gray-400"> <?php echo $percentage;?>% </p>
     <a href="<?php echo URLROOT; ?>testcontroller/index">
     <button class="bg-indigo-600 px-8 py-2 mt-8 rounded-3xl text-gray-100 font-semibold uppercase tracking-wide">Back Home</button></a>

     <p class="mt-6 text-xs text-gray-400"> <?php echo $test ?></p>
   </div>
 </div>







<?php
    require APPROOT.'/views/layout/footer.php';
?>