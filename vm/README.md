# DrupalVM config

## Provisioning production server

This deploys the site to a server, using the IP address in "inventory". Currently we're using DigitalOcean droplets, and you may need to upload SSH keys to digitalocean.com.

```
ansible-playbook -i vm/inventory vendor/geerlingguy/drupal-vm/examples/prod/bootstrap/init.yml -e "ansible_ssh_user=root"
DRUPALVM_ENV=prod ansible-playbook -i vm/inventory vendor/geerlingguy/drupal-vm/provisioning/playbook.yml -e "config_dir=$(pwd)/vm" --become --ask-become-pass --ask-vault-pass
```

## Updating production server

This does the following (among other things):

1. Deploys the latest code from the "master" branch in Git
2. Runs a "composer install"
3. Runs database updates

```
DRUPALVM_ENV=prod ansible-playbook -i vm/inventory vendor/geerlingguy/drupal-vm/provisioning/playbook.yml -e "config_dir=$(pwd)/vm" --sudo --ask-sudo-pass --ask-vault-pass --tags=drupal
```
