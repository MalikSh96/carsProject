<<<<<<< HEAD
# carsProject
=======
# Announcement/disclaimer
Support folder is only containing extra frameworks and libraries that I am using for my project.
I have not developed any of the content in the Support folder, only made use of it for the purpose of learning and developing.
I take no credit for them :) \
I installed through npm (node package manager) help for using datatables, those I have not used as of now, and so far
I am not sure if I will use it later, for now it is installed.\
I have also made use of the "datatables" neat feature.
# carsProject
THIS PROJECT IS STILL IN ITS EARLY STAGES BUT HAS BEEN PROGRESSING VERY MUCH.

# Where are we so far
Well so far we are at a point, where there is a lot of backend functionality that is waiting for be used.
Made a few different paths that a user can redirect to, also now it is possible to:\
  -Register a user.\
  -Sign in with an existent user.\
  -On index.php you see a table with cars.\
  -Also a nav bar which is the one that redirects.\
  -Made some visual design, so the page looks prettier.\
  -Fixed pathings so they redirect correctly.\
  -Once you click on a car from the table, it takes you to another page based on the id of the car you clicked.\
  -Made it possible to register a car, for now anyone can register a car -> this will get changed later to only admin rights feature.\
  -Made it possible to remove a car based on its serialnumber, so if the serialnumber exists in the database it gets removed.\
  -Made it possible to edit a car based on its serialnumber --> for now you have to refill all the information about the car again.\
  -When you log in as an admin you get an extra functionality where you can see all users who is registered.\
  -Made it possible to remove a user based on the users email, so if the user exists in the database the user gets removed.\
  -Made it possible to generate RSS that contains all data for the cars --> Gets saved in the directory. According to https://validator.w3.org/feed/ my RSS setup is correct.\
  -Made it possible for the admin(s) to generate/update their XML file --> Gets saved in the directory.\
  -Made it possible for the admin(s) to generate/update their JSON file --> Gets saved in the directory. According to https://jsonformatter.curiousconcept.com/# my JSON setup is correct.\
  -A user can now edit their own information --> As of now it is only possible for the user to edit their firstname and lastname (1).\
  -An admin can set rights to a user --> Issue is you can't set a users role to 0 (2).\
  -For now you can add ONLY one picture when creating a car (3).\
  -Once you create a car, a folder gets created named after the serialnumber of the car --> Issue is when you create a car, it takes the corresponding picture to it and puts it in the folder, but the picture is empty (4).\
  -^For the above part (4) I have fixed the issue, only thing right now is that I only take ONE picture --> need to redo that later.\
  -I believe I have made it, so that admin only pathes can't get reached.


# What do we need and where do we want to go
  -Need to fix (1).\
  -Need to fix (2).\
  -Need to fix (3) to add more pictures.\
  -Need to fix (4).\
  -(4) is partly fixed.\
  -Need to fix so that when editing information, you don't have to retype all information in order to edit just one field, because as of now when you try to edit one field you need to fill all other fields again in order for it to proceed.
  \
  \
  -On top of all that, once the project is ready to go on the cloud, you need to refactor the pathes that copies from one folder to another.

# The most up-to-date branches
  -Master.\
  -Createfolders.\
  -Securityoptimizer.
>>>>>>> 0df5aec5127fd7918f0bbb157ae74f9818ca4cd4
