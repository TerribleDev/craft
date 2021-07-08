if php craft install/check
then
    php craft migrate/all --interactive=0
    php craft project-config/apply --interactive=0
    php craft cache/flush-schema db --interactive=0
fi
