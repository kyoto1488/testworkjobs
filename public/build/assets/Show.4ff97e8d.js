import{_ as u}from"./AuthenticatedLayout.75975230.js";import{o as r,g as l,a as n,b as i,w as a,F as c,H as h,d as t,t as s,e as o,L as g,k as _,x as f,u as y,c as b,B as x}from"./app.458914d7.js";import{_ as k}from"./DangerButton.87539457.js";import"./ApplicationLogo.3bcb14c7.js";const v={class:"font-semibold text-xl text-gray-800 leading-tight"},w={class:"py-12"},$={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},B={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},V={class:"p-6 text-gray-900"},C={class:"list-none"},N=t("strong",null,"Phone:",-1),F=t("strong",null,"Website:",-1),L=t("strong",null,"Address:",-1),q={key:0,class:"mt-3"},D={class:"font-medium leading-tight text-3xl mt-0 mb-2 text-dark-600 mt-5 mb-4"},E={class:"mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"},H={class:"font-normal text-gray-700 dark:text-gray-400"},j={__name:"Show",setup(S){const m=e=>y().delete(route("companies.delete",e));return(e,p)=>(r(),l(c,null,[n(i(h),{title:e.$page.props.company.name},null,8,["title"]),n(u,null,{header:a(()=>[t("h2",v,s(e.$page.props.company.name)+" - "+s(e.$page.props.vacancy_quantity)+" vacancies",1)]),default:a(()=>[t("div",w,[t("div",$,[t("div",B,[t("div",V,[t("ul",C,[t("li",null,[N,o(" "+s(e.$page.props.company.phone_number),1)]),t("li",null,[F,o(" "+s(e.$page.props.company.website),1)]),t("li",null,[L,o(" "+s(e.$page.props.company.address),1)])]),e.$page.props.auth.user.role==="admin"?(r(),l("div",q,[n(i(g),{class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3",href:e.route("companies.update",e.$page.props.company.id)},{default:a(()=>[o("Edit")]),_:1},8,["href"]),n(k,{onClick:p[0]||(p[0]=()=>m(e.$page.props.company.id))},{default:a(()=>[o("Delete")]),_:1})])):_("",!0)])]),t("h3",D,"Vacancies ("+s(e.$page.props.vacancy_quantity)+")",1),(r(!0),l(c,null,f(e.$page.props.vacancies,d=>(r(),b(i(g),{href:e.route("vacancies.show",d.id),class:"block mt-2 p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"},{default:a(()=>[t("h5",E,s(d.title),1),t("div",H,s(i(x.exports.truncate)(d.text,{length:300})),1)]),_:2},1032,["href"]))),256))])])]),_:1})],64))}};export{j as default};
