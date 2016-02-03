Timed Symfony Test
==================

This repository is part of Bitheater's selection process tests for Symfony developers.

## Installation

For your convenience we've added in the master branch of this repository a Vagrant configuration file and an Ansible playbook, which will create and provision a virtual machine in your local machine with the base application. You're free to use them to set-up the development environment or use other methods to create your development environment.

If you don't want to use vagrant, make sure you have a working PHP/Symfony environment with a MySQL server.
You can skip the "Set up" step, but you'll need to create a local database scheme with this credentials:

    * User: tests
    * DB: tests
    * Password: tests
 

### Pre-requisites to create the development environment with Vagrant and Ansible

If you decide to use Vagrant, please make sure:

* Vagrant is installed on your development machine
* Ansible is installed on your development machine

### Set up Vagrant

    vagrant up
    vagrant ssh

NOTE: If any issue hapens after "vagrant up" execute "vagrant destroy" and try "vagrant up" again

## Set up the application
    
    cd /home/vagrant/test (or go to the root folder where the code has been downloaded if not using vagrant)
    composer intall
    php app/console doctrine:schema:update --force

Load sample data to the database (not required but recommended):

    cd app/import
    ./import.sh

Check if the application is running correctly from any web browser using the url http://192.168.100.100, you should see something similar to the screenshot below

![blog.png](https://bitbucket.org/repo/g6n4d8/images/3146192287-blog.png) 

NOTE: we've seen that some times nginx doest refresh prperly, and we have to force it executing:

    vagran ssh
    sudo service nginx restart

## Exercise

We have a basic blog application built in Symfony 2.8. You should add the following features/amends in order of priority:

* **Filter posts by author** - We want to be able to list all posts from a specific author (the author page)
* **Add new post** - We want to be able to add new posts. No need to be logged in, you can create a post and assign it to a user, we trust on our users!
* **Pagination** - We want to be able to paginate the results (5 per page would be a good number)
* **Author page** -  We'll need a page to show post's author information, please follow the mock-ups below for its implementation
* **Author page link** - Add alink in the listing page pointing to the post's author page
* **Author profile picture** - Add the author picture to the author page using the [Gravatar API](https://en.gravatar.com/site/implement/hash/)
* **Add CSS Styles** - Apply CSS styles to the application so it looks like (approximately) the mock-ups provided below (you can use them as a guide, but feel free to use your own design, if you prefer).

## Mock-ups

Home page

![home.png](https://bitbucket.org/repo/g6n4d8/images/3632752876-home.png)

Post detail page

![detail.png](https://bitbucket.org/repo/g6n4d8/images/3701558153-detail.png)

Author page

![author.png](https://bitbucket.org/repo/g6n4d8/images/1475680140-author.png)

New post form

![new.png](https://bitbucket.org/repo/g6n4d8/images/2743661771-new.png)

## Recommendations

* Use any third-party bundles or front-end frameworks to help you speed up the delivery of the test

## Sending the solution

In order to send your solution, you'll need to fork the repository to your own account and create a pull request so we can review your changes. If you're not sure how to do that, please [read this document from the Bitbucket team](https://confluence.atlassian.com/bitbucket/forking-a-repository-221449527.html).

When creating the pull request, there's no need to assign it to any user nor add a description if you don't want.
