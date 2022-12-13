import{i as c,u as _,o as m,g as i,d as o,a as e,b as r,w,T as g,f as y,e as v,k as V}from"./app.458914d7.js";import{a as l,_ as n}from"./InputLabel.c79cb8f8.js";import{_ as x}from"./PrimaryButton.4d513181.js";import{_ as d}from"./TextInput.c30d1586.js";const k=o("header",null,[o("h2",{class:"text-lg font-medium text-gray-900"},"Update Password"),o("p",{class:"mt-1 text-sm text-gray-600"}," Ensure your account is using a long, random password to stay secure. ")],-1),b=["onSubmit"],P={class:"flex items-center gap-4"},S={key:0,class:"text-sm text-gray-600"},B={__name:"UpdatePasswordForm",setup(N){const u=c(null),p=c(null),s=_({current_password:"",password:"",password_confirmation:""}),f=()=>{s.put(route("password.update"),{preserveScroll:!0,onSuccess:()=>s.reset(),onError:()=>{s.errors.password&&(s.reset("password","password_confirmation"),u.value.focus()),s.errors.current_password&&(s.reset("current_password"),p.value.focus())}})};return(U,a)=>(m(),i("section",null,[k,o("form",{onSubmit:y(f,["prevent"]),class:"mt-6 space-y-6"},[o("div",null,[e(n,{for:"current_password",value:"Current Password"}),e(d,{id:"current_password",ref_key:"currentPasswordInput",ref:p,modelValue:r(s).current_password,"onUpdate:modelValue":a[0]||(a[0]=t=>r(s).current_password=t),type:"password",class:"mt-1 block w-full",autocomplete:"current-password"},null,8,["modelValue"]),e(l,{message:r(s).errors.current_password,class:"mt-2"},null,8,["message"])]),o("div",null,[e(n,{for:"password",value:"New Password"}),e(d,{id:"password",ref_key:"passwordInput",ref:u,modelValue:r(s).password,"onUpdate:modelValue":a[1]||(a[1]=t=>r(s).password=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),e(l,{message:r(s).errors.password,class:"mt-2"},null,8,["message"])]),o("div",null,[e(n,{for:"password_confirmation",value:"Confirm Password"}),e(d,{id:"password_confirmation",modelValue:r(s).password_confirmation,"onUpdate:modelValue":a[2]||(a[2]=t=>r(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),e(l,{message:r(s).errors.password_confirmation,class:"mt-2"},null,8,["message"])]),o("div",P,[e(x,{disabled:r(s).processing},{default:w(()=>[v("Save")]),_:1},8,["disabled"]),e(g,{"enter-from-class":"opacity-0","leave-to-class":"opacity-0",class:"transition ease-in-out"},{default:w(()=>[r(s).recentlySuccessful?(m(),i("p",S,"Saved.")):V("",!0)]),_:1})])],40,b)]))}};export{B as default};
