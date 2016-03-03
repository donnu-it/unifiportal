<?php
/**
 * SAML 2.0 remote IdP metadata for simpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote 
 */

/*
 * Guest IdP. allows users to sign up and register. Great for testing!
 */
/*$metadata['https://openidp.feide.no'] = array(
	'name' => array(
		'en' => 'Feide OpenIdP - guest users',
		'no' => 'Feide Gjestebrukere',
	),
	'description'          => 'Here you can login with your account on Feide RnD OpenID. If you do not already have an account on this identity provider, you can create a new one by following the create new account link and follow the instructions.',

	'SingleSignOnService'  => 'https://openidp.feide.no/simplesaml/saml2/idp/SSOService.php',
	'SingleLogoutService'  => 'https://openidp.feide.no/simplesaml/saml2/idp/SingleLogoutService.php',
	'certFingerprint'      => 'c9ed4dfb07caf13fc21e0fec1572047eb8a7a4cb'
);*/

/*$metadata['https://sts.windows.net/390c7c61-4a5e-479e-a8b5-a05b21d22d78/'] = array (
  'entityid' => 'https://sts.windows.net/390c7c61-4a5e-479e-a8b5-a05b21d22d78/',
  'contacts' => 
  array (
  ),
  'metadata-set' => 'saml20-idp-remote',
  'SingleSignOnService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://login.microsoftonline.com/390c7c61-4a5e-479e-a8b5-a05b21d22d78/saml2',
    ),
    1 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://login.microsoftonline.com/390c7c61-4a5e-479e-a8b5-a05b21d22d78/saml2',
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://login.microsoftonline.com/390c7c61-4a5e-479e-a8b5-a05b21d22d78/saml2',
    ),
  ),
  'ArtifactResolutionService' => 
  array (
  ),
  'keys' => 
  array (
    0 => 
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIDPjCCAiqgAwIBAgIQsRiM0jheFZhKk49YD0SK1TAJBgUrDgMCHQUAMC0xKzApBgNVBAMTImFjY291bnRzLmFjY2Vzc2NvbnRyb2wud2luZG93cy5uZXQwHhcNMTQwMTAxMDcwMDAwWhcNMTYwMTAxMDcwMDAwWjAtMSswKQYDVQQDEyJhY2NvdW50cy5hY2Nlc3Njb250cm9sLndpbmRvd3MubmV0MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkSCWg6q9iYxvJE2NIhSyOiKvqoWCO2GFipgH0sTSAs5FalHQosk9ZNTztX0ywS/AHsBeQPqYygfYVJL6/EgzVuwRk5txr9e3n1uml94fLyq/AXbwo9yAduf4dCHTP8CWR1dnDR+Qnz/4PYlWVEuuHHONOw/blbfdMjhY+C/BYM2E3pRxbohBb3x//CfueV7ddz2LYiH3wjz0QS/7kjPiNCsXcNyKQEOTkbHFi3mu0u13SQwNddhcynd/GTgWN8A+6SN1r4hzpjFKFLbZnBt77ACSiYx+IHK4Mp+NaVEi5wQtSsjQtI++XsokxRDqYLwus1I1SihgbV/STTg5enufuwIDAQABo2IwYDBeBgNVHQEEVzBVgBDLebM6bK3BjWGqIBrBNFeNoS8wLTErMCkGA1UEAxMiYWNjb3VudHMuYWNjZXNzY29udHJvbC53aW5kb3dzLm5ldIIQsRiM0jheFZhKk49YD0SK1TAJBgUrDgMCHQUAA4IBAQCJ4JApryF77EKC4zF5bUaBLQHQ1PNtA1uMDbdNVGKCmSf8M65b8h0NwlIjGGGy/unK8P6jWFdm5IlZ0YPTOgzcRZguXDPj7ajyvlVEQ2K2ICvTYiRQqrOhEhZMSSZsTKXFVwNfW6ADDkN3bvVOVbtpty+nBY5UqnI7xbcoHLZ4wYD251uj5+lo13YLnsVrmQ16NCBYq2nQFNPuNJw6t3XUbwBHXpF46aLT1/eGf/7Xx6iy8yPJX4DyrpFTutDz882RWofGEO5t4Cw+zZg70dJ/hH/ODYRMorfXEW+8uKmXMKmX2wyxMKvfiPbTy5LmAU8Jvjs2tLg4rOBcXWLAIarZ',
    ),
    1 => 
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIC4jCCAcqgAwIBAgIQQNXrmzhLN4VGlUXDYCRT3zANBgkqhkiG9w0BAQsFADAtMSswKQYDVQQDEyJhY2NvdW50cy5hY2Nlc3Njb250cm9sLndpbmRvd3MubmV0MB4XDTE0MTAyODAwMDAwMFoXDTE2MTAyNzAwMDAwMFowLTErMCkGA1UEAxMiYWNjb3VudHMuYWNjZXNzY29udHJvbC53aW5kb3dzLm5ldDCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBALyKs/uPhEf7zVizjfcr/ISGFe9+yUOqwpel38zgutvLHmFD39E2hpPdQhcXn4c4dt1fU5KvkbcDdVbP8+e4TvNpJMy/nEB2V92zCQ/hhBjilwhF1ETe1TMmVjALs0KFvbxW9ZN3EdUVvxFvz/gvG29nQhl4QWKj3x8opr89lmq14Z7T0mzOV8kub+cgsOU/1bsKqrIqN1fMKKFhjKaetctdjYTfGzVQ0AJAzzbtg0/Q1wdYNAnhSDafygEv6kNiquk0r0RyasUUevEXs2LY3vSgKsKseI8ZZlQEMtE9/k/iAG7JNcEbVg53YTurNTrPnXJOU88mf3TToX14HpYsS1ECAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAfolx45w0i8CdAUjjeAaYdhG9+NDHxop0UvNOqlGqYJexqPLuvX8iyUaYxNGzZxFgGI3GpKfmQP2JQWQ1E5JtY/n8iNLOKRMwqkuxSCKJxZJq4Sl/m/Yv7TS1P5LNgAj8QLCypxsWrTAmq2HSpkeSk4JBtsYxX6uhbGM/K1sEktKybVTHu22/7TmRqWTmOUy9wQvMjJb2IXdMGLG3hVntN/WWcs5w8vbt1i8Kk6o19W2MjZ95JaECKjBDYRlhG1KmSBtrsKsCBQoBzwH/rXfksTO9JoUYLXiW0IppB7DhNH4PJ5hZI91R8rR0H3/bKkLSuDaKLWSqMhozdhXsIIKvJQ==',
    ),
  ),
);*/

$metadata['http://fs.donnu.edu.ua/adfs/services/trust'] = array (
  'entityid' => 'http://fs.donnu.edu.ua/adfs/services/trust',
  'contacts' => 
  array (
    0 => 
    array (
      'contactType' => 'support',
    ),
  ),
  'metadata-set' => 'saml20-idp-remote',
  'SingleSignOnService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://fs.donnu.edu.ua/adfs/ls/',
    ),
    1 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://fs.donnu.edu.ua/adfs/ls/',
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://fs.donnu.edu.ua/adfs/ls/',
    ),
    1 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://fs.donnu.edu.ua/adfs/ls/',
    ),
  ),
  'ArtifactResolutionService' => 
  array (
  ),
  'keys' => 
  array (
    0 => 
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIC4DCCAcigAwIBAgIQJbhnuPHcNrtKhv2e+wDRszANBgkqhkiG9w0BAQsFADAsMSowKAYDVQQDEyFBREZTIEVuY3J5cHRpb24gLSBmcy5kb25udS5lZHUudWEwHhcNMTUxMTE1MTE0OTQ2WhcNMjAxMTEzMTE0OTQ2WjAsMSowKAYDVQQDEyFBREZTIEVuY3J5cHRpb24gLSBmcy5kb25udS5lZHUudWEwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCoXzbvqKc8T+rD/Apv1zz6su1UgNFY/hs9920K2OktQIzqO1f6D78dX0dLvaVLXXr/bBJ06JahcvAeI4iyi6lVh8dwrgmX/r72UaG4IKg6l8VtWHBdduv9GKd/csKd2VXUC9L3P0E9W8o4Kp71rnRdobYabrsBrDuBWy4Mc//E/Q9zjBY2+QuauvrgXlY9tsn5wRCWP21u+ECBUvTUVfpHH6nE9MFP/4HxHHMRla0DJKkSRdikOWgzt+Y/O+nFl+aOIcER6SoF+G7fOMhQMOwmNfiijTmhXl6KyW10yibMQNqSLL9h6jhAHABpzRjlGWaqu582s9Zn8S2lO+Cqc9KfAgMBAAEwDQYJKoZIhvcNAQELBQADggEBADkD8OFX9dPpQH5cbw9LhQmGt99jq0MPhEG2lzXyEy63dfpPU1PK8kRuIJcDUR0YluF6SRQZUSeMsknvjipJg4+riTgYs6tzL4jF3e3u+fEV1v6Q49lbbn+GnNnh5bC5n0x8P/88afdBumHxYvLYtepYbRBOFDLhw1o6Dwr0nuN8HJt/PSIXg+TeHhUu76dmwV/jSktxihqvrgHH0EzZJoPOSjS/YzCVFlx33Zj7WJzqqlrbocVG4hiq8tMGWQzlY8QcJ7xwGul8QlcPdlIHZm5cINDdjxRjX/33uxMPnbGw4pitiXPoH1q5q0Y6DOxjzZzldH0Mx36iin4vKFWiX/U=',
    ),
    1 => 
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIC2jCCAcKgAwIBAgIQHT1AvS9vsaZGKQc3KJEj7DANBgkqhkiG9w0BAQsFADApMScwJQYDVQQDEx5BREZTIFNpZ25pbmcgLSBmcy5kb25udS5lZHUudWEwHhcNMTUxMTE1MTE0OTU0WhcNMjAxMTEzMTE0OTU0WjApMScwJQYDVQQDEx5BREZTIFNpZ25pbmcgLSBmcy5kb25udS5lZHUudWEwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC1FS8WaBom0/+S8gzl9rQ8uTEaswECDM62KN6VIFsrW5qu2m0AVn5VuvYob6Vjm4GWqKDKFxeHDTPou44nbxueVtnqVu330we9Fny3Fi/P+ebz2Pa6r4c6Y085qX2FYFnz+pRNJ84n6PyWkrNR6J4UrJzlgWgqcQsieIP0WuBvZbW/9Pr3IRIbCdPXKlER9YKgpemk8FDAIU0+8SgAFka7nxdgK5alWzrNNVpnfA9aHvEJ/r9g0blygTbkzQQZDdfR3oI54pgj0zp3jSIa9fah7Xw3alel9DuNuMiTf25qck+CzNu/D03GprnEq+usVbpj8gVSjcfOqARKezyjrfP/AgMBAAEwDQYJKoZIhvcNAQELBQADggEBAEFcVZnWHo4Oo2S5jUfnQVYdalVUgLrEldw39EWXaEtNU1U/vIFZqZvbg3XYc3GxXYXT3Dm0ks6xUp2CeqDNrYKjSUMCNEvF7cDO20Z3hTqkz+BfHdH5bKAVXocNlbB9PH1D8KiIWVE8o5LGqpoWqhyDKbg3/1E27AeqwlNFB63rUgldN3vWBb9igpa1QWcOJyZ4I7B4gXfLuT7g2Apq0GBG1sDcLOx538SnJzK48wq2+/xkAAZN1ZW3b14aRWKaMvCRTBpPX3+WUeCHENbjyG/f0B+AOsdDyMhofeRkxO+B8KZ38j0N+EtIuKpPr5IdXX7vV+uqmyVxetQ5p7SYdws=',
    ),
  ),
);
