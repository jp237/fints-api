# EditBankConnectionParams

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | New name for the bank connection. Maximum length is 64. If you do not want to change the current name let this field remain unset. If you want to clear the current name, set the field&#39;s value to an empty string (\&quot;\&quot;). | [optional] 
**banking_user_id** | **string** | NOTE: This field is deprecated and will be removed at some point. Use &#39;loginCredentials&#39; + &#39;interface&#39; instead. If any of those two fields is used, then the value of this field will be ignored.&lt;br&gt;&lt;br&gt;New online banking user ID. If you do not want to change the current user ID let this field remain unset. In case you need to use finAPI&#39;s web form to let the user update the field, just set the field to any value, so that the service recognizes that you wish to use the web form flow. Note that you cannot clear the current user ID, i.e. a bank connection must always have a user ID (except for when it is a &#39;demo connection&#39;). Max length: 170. | [optional] 
**banking_customer_id** | **string** | NOTE: This field is deprecated and will be removed at some point. Use &#39;loginCredentials&#39; + &#39;interface&#39; instead. If any of those two fields is used, then the value of this field will be ignored.&lt;br&gt;&lt;br&gt;New online banking customer ID. If you do not want to change the current customer ID let this field remain unset. In case you need to use finAPI&#39;s web form to let the user update the field, just set the field to non-empty value, so that the service recognizes that you wish to use the web form flow. If you want to clear the current customer ID, set the field&#39;s value to an empty string (\&quot;\&quot;). Max length: 170. | [optional] 
**banking_pin** | **string** | NOTE: This field is deprecated and will be removed at some point. Use &#39;loginCredentials&#39; + &#39;interface&#39; instead. If any of those two fields is used, then the value of this field will be ignored.&lt;br&gt;&lt;br&gt;New online banking PIN. If you do not want to change the current PIN let this field remain unset. In case you need to use finAPI&#39;s web form to let the user update the field, just set the field to non-empty value, so that the service recognizes that you wish to use the web form flow. If you want to clear the current PIN, set the field&#39;s value to an empty string (\&quot;\&quot;).&lt;br/&gt;&lt;br/&gt;Any symbols are allowed. Max length: 170. | [optional] 
**interface** | **string** | The interface for which you want to edit data. Must be given when you pass &#39;loginCredentials&#39; and/or a &#39;defaultTwoStepProcedureId&#39;. | [optional] 
**login_credentials** | [**\Swagger\Client\Model\LoginCredential[]**](LoginCredential.md) | Set of login credentials that you want to edit. Must be passed in combination with the &#39;interface&#39; field. The labels that you pass must match with the login credential labels that the respective interface defines. If you want to clear the stored value for a credential, you can pass an empty string (\&quot;\&quot;) as value.In case you need to use finAPI&#39;s web form to let the user update the login credentials, send all fields the user wishes to update with a non-empty value.In case all fields contain an empty string (\&quot;\&quot;), no webform will be generated. Note that any change in the credentials will automatically remove the saved consent data associated with those credentials.&lt;br&gt;&lt;br&gt;NOTE: When you pass this field, then the fields &#39;bankingUserId&#39;,&#39;bankingCustomerId&#39; and &#39;bankingPin&#39; will be ignored. | [optional] 
**default_two_step_procedure_id** | **string** | NOTE: In the future, this field will work only in combination with the &#39;interface&#39; field.&lt;br&gt;&lt;br&gt;New default two-step-procedure. Must match the &#39;procedureId&#39; of one of the procedures that are listed in the bank connection. If you do not want to change this field let it remain unset. If you want to clear the current default two-step-procedure, set the field&#39;s value to an empty string (\&quot;\&quot;). | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

