# DrupalVM config

## Provisioning production server

This deploys the site to a server, using the IP address in "inventory". Currently we're using DigitalOcean droplets, and you may need to upload SSH keys to digitalocean.com.

Inside the vendor/geerlingguy/drupal-vm/examples/prod/bootstrap folder, copy the example.vars.yml file to vars.yml and update the variables in that file for your own administrative account (make sure especially to update the  admin_password value!).

Set up the sensitive variables in the vm/ folder.

```
cd vm
ansible-vault create secrets.yml
```

Then add the secret passwords there in this form:

```
drupal_account_pass: add-your-secure-password-1-here
drupal_db_password: add-your-secure-password-2-here mysql_root_password: add-your-secure-password-3-here
```

Next go back to the root of the repository and run some commands:

```
ansible-playbook -i vm/inventory vendor/geerlingguy/drupal-vm/examples/prod/bootstrap/init.yml -e "ansible_ssh_user=root"
DRUPALVM_ENV=prod ansible-playbook -i vm/inventory vendor/geerlingguy/drupal-vm/provisioning/playbook.yml -e "config_dir=$(pwd)/vm" --become --ask-become-pass --ask-vault-pass
```

Next, visit the site in a browser and install Drupal.

## Updating configuration on production server

This does the following (among other things):

1. Deploys the latest code from the "master" branch in Git
2. Runs a "composer install"
3. Runs database updates

```
DRUPALVM_ENV=prod ansible-playbook -i vm/inventory vendor/geerlingguy/drupal-vm/provisioning/playbook.yml -e "config_dir=$(pwd)/vm" --sudo --ask-sudo-pass --ask-vault-pass --tags=drupal
```
