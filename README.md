# comments-bundle
Comment section made with symfony 2.8
# install of the symfony framework for linux and macOS
 sudo mkdir -p /usr/local/bin
 sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
 sudo chmod a+x /usr/local/bin/symfony

# setting up symfony framework 

 symfony new project-name 2.8
 #start the web server 
 php app/console server:start 

# install and set-up libraries 
  # jsrouting-bundle 
   composer require friendsofsymfony/jsrouting-bundle  
   # follow this link for more specific information about setting up this one https://symfony.com/doc/master/bundles/FOSJsRoutingBundle/installation.html
   composer require friendsofsymfony/user-bundle "~2.0"
   # more spec inf about settin up -> https://symfony.com/doc/current/bundles/FOSUserBundle/index.html
