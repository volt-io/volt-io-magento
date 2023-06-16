# Volt Magento 2 Payment Module

## Description
@ToDo

## Main functions
@ToDo

### Requirements
- Magento version: 2.3.0 - 2.4.6.
- PHP version according to the requirements of your store version.

### [Changelog](CHANGELOG.md)

## Installation
1. Execute the following command in Magento 2 root folder:
```shell
composer require volt/payment // @ToDo
```
2. Enter following commands to enable module:
```shell
bin/magento module:enable Volt_Payment
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy
bin/magento cache:flush
```

## Generate API credentials
1. Log in to the [Volt Fuzebox](https://fuzebox.volt.io) account.
2. Go to **Configuration** -> **Applications**.
3. Click **Create Application**.
4. Enter the **Application Name** and select **Customer** you want to use.
5. For **Payment return URLs** enter the following URL for all statuses (replace `your-store-url.com` with your store URL):
```
https://your-store-url.com/volt/payment/return
```
6. For **Verify return URLs** enter the following URL (replace `your-store-url.com` with your store URL):
```
https://your-store-url.com/volt/payment/verify
```
7. Click **Save**.
8. Copy the **Client ID** and **Client Secret** from **Credentials** section.
9. Go to **Payment Notification** tab.
10. Click **Configure** button.
11. Enter the following URL for **Webhook URL** (replace `your-store-url.com` with your store URL):
```
https://your-store-url.com/volt/payment/notification
```
12. Enter your address e-mail in **Failing notifications alert e-mail** field.
13. Click **Save**.

## Module Configuration
1. Log in to the Magento Admin.
2. Go to **Stores** > **Configuration**.
3. In the left panel, go to **Sales** > **Payment Methods**.
4. Expand the **Volt** section.

### General Settings
1. Go to [Module configuration](#configuration).
2. Set **Enabled** to **Yes**.
3. Set **Title** to the title of your choice.
4. Set **Sandbox** to **Yes** if you want to use the sandbox environment.
5. Set **Client ID** and **Client Secret** to the credientals you copied from [Generate API credentials](#generate-api-credentials).
6. Set **Username** and **Password** to credentials you're using for logging in to the [Volt Fuzebox](https://fuzebox.volt.io) account.
7. Select **Sort order** for the payment method.
8. You can change the **Status for pending payment** field to the status you want to set for the order after the payment is started.
9. You can change the **Status for received payment** field to the status you want to set for the order after the payment is received.
10. You can change the **Status for failed payment** field to the status you want to set for the order after the payment is failed.
11. Click **Save Config** on top of the page.

## Refunds

In order to enable online refunds, you need to have active [Volt Connect](https://www.volt.io/connect/) service.

1. Go to [Module configuration](#configuration).
2. Set **Refund Enabled** to **Yes**.
3. Click **Save Config** on top of the page.

## Support
If you have any issues with this extension, open an issue on [GitHub]@ToDo or contact with [Suoport](@ToDo).

