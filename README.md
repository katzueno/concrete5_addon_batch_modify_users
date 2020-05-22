
Batch Modify Users job for concrete5
==========

(c) 2020. Katz Ueno (concrete5 Japan, Inc.)
MIT License.

# About

This is concrete5 Job to batch edit all existing users to make anonymous or edit.

For example, you have the production site. You may want to copy the data to test environment.
When you copy the production data, you may want to erase all of existing user information to protect their privacy upon test.

**This is bleeding edge add-on** You need the PHP knowledge.

I want to add a feature to be able to configurable via dashboard. Your PR is welcomed.

# Production & Default environment protection

concrete5 can set environment.
If this concrete5 environment is set as `production` or `default`, this job **WILL NOT RUN** for safety measurement.

# Install & Set-it up

## Installation

1. Upload the `batch_modify_users_job` folder to /packages/
2. Login to your concrete5 site as an administrator.
3. Click on the `Dashboard`’` icon, top right of page.
4. Click the `Extend concrete5` link in open sidebar.
5. Find this package in the list of packages `Awaiting Installation`.
6. Click the `install` button.

## How to set-it up to match your site needs

1. Open a file /packages/batch_modify_users_job/jobs/batch_modify_users.php
1. Comment out line 38-46 IF you didn't set concrete5 environment and don't mind of RISKING to erase your production users data.
1. Edit around line 55~68, due to the concrete5 restriction, you may not be able to apply multiple filters (checked upto 8.4.1).
1. Edit around line 114-115 if you have additional user attributes that needs to be clean.
1. Visit: Dashboard - System and Settings - Optimization - Automated Job
1. Move to non-production or non-default environment concrete5 site, then run an automated job.
