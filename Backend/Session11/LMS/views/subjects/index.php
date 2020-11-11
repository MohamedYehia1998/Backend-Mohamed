<?php


$subjects = Subject::all();

?>


<table border="1" cellspacing="1" class="table table-bordered table-striped table-hover">
    <thead>
        <th>Subject ID</th>
        <th>Subject Name</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach ($subjects as $subject) { ?>
        <tr>
            <td> <?php echo $subject->id; ?></td>
            <td> <?php echo $subject->name; ?></td>
            <td> 
                <a class="btn btn-success" href = "./index.php?p=subjects&action=read&id=<?php echo $subject->id;?>">Read</a>
                <a class="btn btn-danger" href = "./index.php?p=subjects&action=update&id=<?php echo $subject->id;?>">Update</a>
                <a class="btn btn-warning" href = "./index.php?p=subjects&action=delete&id=<?php echo $subject->id;?>">Delete</a>         
            </td>
        </tr>    
        <?php } ?>
    </tbody>
</table>
<a href = "./index.php?p=subjects&action=create" class="btn btn-primary">Create new subject</a>