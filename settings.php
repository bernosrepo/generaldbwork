<?php
// echo "hi";
$secure_vars = explode(";",getenv("phpSPO_secure_vars"));
$parts = explode('@', $secure_vars[0]);
$domain_parts = explode('.', $parts[1]);
//$tenant_prefix = $domain_parts[0];
$tenant_prefix = "debremarkosuniversity";

return array(
    'TenantName' => "{$tenant_prefix}.onmicrosoft.com",
	'Url' => "https://{$tenant_prefix}.sharepoint.com",
    'TeamSiteUrl' => "https://{$tenant_prefix}.sharepoint.com/sites/team",
    // 'OneDriveUrl' => "https://{$tenant_prefix}-my.sharepoint.com",
    // 'AdminTenantUrl' => "https://{$tenant_prefix}-admin.sharepoint.com",
    //'Password' => $secure_vars[1],
    //'UserName' => $secure_vars[0],
    'Password' => "Lok39754",
    'UserName' => "gashaw_taye@dmu.edu.et",
    'ClientId' => "dd268181-3b1a-466c-a9fe-5b2a309efcb7",
    //'ClientSecret' => $secure_vars[2],
    'ClientSecret' => "0379aeb4-43b8-4d5d-a760-228d1c28353b",
    'RedirectUrl' => "https://{$tenant_prefix}.sharepoint.com",
    // 'TestAccountName' => "gashaw_taye@{$tenant_prefix}.onmicrosoft.com",
    // 'TestAltAccountName' => "gashaw_taye@{$tenant_prefix}.onmicrosoft.com"
);
