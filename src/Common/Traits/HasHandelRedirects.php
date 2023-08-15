<?php

namespace VendorName\Skeleton\Common\Traits;

trait HasHandelRedirects
{
    protected $success_url;
    protected $fail_url;

    private function handleRedirects()
    {
        $success_url = config("payment-:package_slug_without_prefix.success_url");
        $fail_url =  config("payment-:package_slug_without_prefix.fail_url");

        if ($success_url && !filter_var($success_url, FILTER_VALIDATE_URL)) {
            $this->success_url = url($success_url);
        } else {
            $this->success_url = $success_url;
        }

        if ($fail_url && !filter_var($fail_url, FILTER_VALIDATE_URL)) {
            $this->fail_url = url($fail_url);
        } else {
            $this->fail_url = $fail_url;
        }
    }
}
