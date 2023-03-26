--- ================================================
--script  MODELADO MULTIDIMENSIONAL PRUEBAS SABERPRO
--
--=================================================
-- DEFINICION MODELO
--=================================================
--DIMENSION ESTUDIANTES
create table dim_estudiantes(
id_estudiante serial not null primary key,
estuconsecutivo text,
estu_genero text,
estu_estrato text,
estu_nivel_sisben text,
estu_ing_fmliar_mensual text,
estu_rango_edad text,
estu_estado_civil_nom text,
estu_discapacidad text,
estu_sn_vive_flia text,
estu_sn_pers_cargo text,
estu_max_nivel_educa_padres text,
estu_ocup_padre text,
estu_ocup_madre text,
estu_condicion_vivienda text,
estu_condicion_vive text,
estu_condicion_electrodomesticos text,
estu_condicion_tic text,
estu_sn_trabaja text);

-- DIMENSION INSTITUCIONES
create table dim_instituciones(
id_institucion serial not null primary key,
inst_cod_institucion text,
inst_nombre_institucion text,
inst_origen text,
inst_caracter_academico text,
inst_origen_general text,
inst_acreditada text);
--drop table dim_programas cascade;
-- DIMENSION PROGRAMAS
-- delete from dim_programas;
create table dim_programas(
id_programa serial not null primary key,
prgrm_prac_id_academico text,
prgm_academico text,
prgrm_nivel_academico text,
prgm_metodologia text,
prgrm_nucleo_pregrado text,
prgrm_area_conoc text,
prgrm_cod_grupo_ref text,
prgrm_grupo_referencia text,
prgrm_area_grupo_referencia text,
prgm_acreditado text);
-- aumenta municpio del programa
--prgm_municipio text);


--DIMENSION LUGARES
create table dim_lugares(
id_lugar serial not null primary key,
inst_prgm_municipio text,
inst_prgm_dpto text,
inst_prgm_zonageo text);

--drop table dim_pruebas cascade;
--drop table fact_saberpro;
-- DIMENSION PRUEBAS
create table dim_pruebas(
id_prueba serial not null primary key,
cod_estuconsecutivo text,
cod_aplicacion text,
mod_sn_lectura_critica text,
mod_sn_comunica_escrita text,
mod_sn_razona_cuantitativo text,
mod_sn_ingles text,
mod_sn_comp_ciudadanas text,
mod_lectura_critica_desemp text,
mod_comunica_escrita_desemp text,
mod_razona_cuantitativo_desemp text,
mod_ingles_desemp text,
mod_comp_ciudadanas_desemp text);

-- DIMENSION TIEMPO
create table dim_tiempo(
id_tiempo serial not null primary key,
prueba text,
semestre_prue text,
ano_prue text);

--drop table fact_saberpro
--
--TABLA HECHOS
create table fact_saberpro(
id_estudiante integer not null references dim_estudiantes(id_estudiante),
id_institucion integer not null references dim_instituciones(id_institucion),
id_programa integer not null references dim_programas(id_programa),
id_lugar integer not null references dim_lugares(id_lugar),
id_prueba integer not null references dim_pruebas(id_prueba),
id_tiempo integer not null references dim_tiempo(id_tiempo),
cod_consecutivo text,
numero_estu integer,
numero_estu_lectura_critica integer,
numero_estu_comunica_escrita integer,
numero_estu_razona_cuantitativo integer,
numero_estu_ingles integer,
numero_estu_comp_ciudadanas integer, 
media_general numeric(4,1),
media_mod_lectura_critica numeric(4,1),
media_mod_comunica_escrita numeric(4,1),
media_mod_razona_cuantitativo numeric(4,1),
media_mod_ingles numeric(4,1),
media_mod_comp_ciudadanas numeric(4,1),
primary key (id_estudiante,id_institucion,id_programa,id_lugar,id_prueba,id_tiempo)); 
--

--============================================================
-- POBLAMIENTO MODELO CARGA DE DATOS
--============================================================
-- DIMENSION ESTUDIANTES
--
insert into dim_estudiantes(
estuconsecutivo,estu_genero,estu_estrato,estu_nivel_sisben,estu_ing_fmliar_mensual,estu_rango_edad,estu_estado_civil_nom,estu_discapacidad,
estu_sn_vive_flia,estu_sn_pers_cargo,estu_max_nivel_educa_padres,estu_ocup_padre,estu_ocup_madre,estu_condicion_vivienda,
estu_condicion_vive,estu_condicion_electrodomesticos,estu_condicion_tic,estu_sn_trabaja)
(select 
estuconsecutivo,estu_genero,estu_estrato,fami_nivel_sisben,fami_ing_fmliar_mensual,estu_rango_edad,estu_estado_civil_nom,estu_discapacidad,
estu_sn_vive_flia,estu_sn_pers_cargo,fami_max_nivel_educa_padres,fami_ocup_padre,fami_ocup_madre,eco_condicion_vivienda,
eco_condicion_vive,eco_condicion_electrodomesticos,eco_condicion_tic,estu_sn_trabaja
from saberpro_final);
--INSERT 0 720856
-- Query returned successfully in 8 secs 482 msec.

-- DIMENSION INSTITUCIONES
--
insert into dim_instituciones(
inst_cod_institucion,inst_nombre_institucion,inst_origen,inst_caracter_academico,inst_origen_general,inst_acreditada)
(select distinct
inst_cod_institucion,inst_nombre_institucion,inst_origen,inst_caracter_academico,inst_origen_general,inst_acreditada 
from saberpro_final);
-- INSERT 0 437
-- Query returned successfully in 2 secs 65 msec.
/* nota
-- SELECT * FROM PROGRAMAS_IES ORDER BY 1;
-- select * from programas_ies where nombre_inst like '%UNIPANAMERICANA%' order by codigo_snies
-- Hacer limpieza con los codigos de los programas teniendo en cuenta el codigo snies de los programas de las ies
*/
-- DIMENSION PROGRAMAS
-- delete from dim_programas;
insert into dim_programas(
prgrm_prac_id_academico,prgm_academico,prgrm_nivel_academico,prgm_metodologia,prgrm_nucleo_pregrado,
prgrm_area_conoc,prgrm_cod_grupo_ref,prgrm_grupo_referencia,prgrm_area_grupo_referencia,prgm_acreditado)
(select distinct 
estu_prac_id_prgrm_academico,estu_prgm_academico,estu_nivel_prgm_academico,
inst_prgm_metodologia,estu_nucleo_pregrado,estu_area_conoc,estu_cod_grupo_ref,estu_grupo_referencia,area_grupo_referencia,inst_prgm_acreditado
from saberpro_final);
-- INSERT 0 8111
-- Query returned successfully in 2 secs 566 msec.
-- con municipios inserta 9323
--
--DIMENSION LUGARES
insert into dim_lugares(
inst_prgm_municipio,inst_prgm_dpto,inst_prgm_zonageo)
(select distinct inst_prgm_municipio,inst_prgm_dpto,inst_prgm_zonageo from saberpro_final order by 1);
 --INSERT 0 297
-- Query returned successfully in 1 secs 679 msec.
 --
 -- DIMENSION PRUEBAS
insert into dim_pruebas(
cod_estuconsecutivo,cod_aplicacion,mod_sn_lectura_critica,mod_sn_comunica_escrita,mod_sn_razona_cuantitativo,mod_sn_ingles,mod_sn_comp_ciudadanas,
mod_lectura_critica_desemp,mod_comunica_escrita_desemp,mod_razona_cuantitativo_desemp,mod_ingles_desemp,mod_comp_ciudadanas_desemp)
(select 
estuconsecutivo,estu_cod_aplicacion,mod_sn_lectura_critica,mod_sn_comunica_escrita,mod_sn_razona_cuantitativo,mod_sn_ingles,mod_sn_comp_ciudadanas, 
mod_lectura_critica_desemp,mod_comunica_escrita_desemp,mod_razona_cuantitativo_desemp,mod_ingles_desemp,mod_comp_ciudadanas_desemp
from saberpro_final);
-- INSERT 0 720856
-- Query returned successfully in 7 secs 59 msec.
 --
 -- DIMENSION TIEMPO
insert into dim_tiempo(
prueba,semestre_prue,ano_prue)
(select distinct prueba,semestre_prue,ano_prue from saberpro_final order by 1);
--
--INSERT 0 6
-- Query returned successfully in 1 secs 837 msec.
--=============
begin;
-- TABLA DE HECHOS
insert into fact_saberpro(
id_estudiante,id_institucion,id_programa,id_lugar,id_prueba,id_tiempo,
cod_consecutivo,
numero_estu,
numero_estu_lectura_critica,numero_estu_comunica_escrita,numero_estu_razona_cuantitativo,
numero_estu_ingles,numero_estu_comp_ciudadanas, 
media_general,
media_mod_lectura_critica,media_mod_comunica_escrita,media_mod_razona_cuantitativo,media_mod_ingles,media_mod_comp_ciudadanas)
(select id_estudiante,id_institucion,id_programa,id_lugar,id_prueba,id_tiempo,
t1.estuconsecutivo,
1 nestu,
case when t1.mod_sn_lectura_critica='S' then 1 else 0 end sn_lec,
case when t1.mod_sn_comunica_escrita='S' then 1 else 0 end sn_com,
case when t1.mod_sn_razona_cuantitativo='S' then 1 else 0 end sn_raz,
case when t1.mod_sn_ingles='S' then 1 else 0 end sn_ing,
case when t1.mod_sn_comp_ciudadanas='S' then 1 else 0 end sn_ciud,
round((coalesce(t1.mod_lectura_critica::numeric,0)+coalesce(t1.mod_comunica_escrita_punt::numeric,0)+
	   coalesce(t1.mod_razona_cuantitativo_punt::numeric,0)+coalesce(t1.mod_ingles_punt::numeric,0)+
	   coalesce(t1.mod_comp_ciudadanas_punt::numeric,0))/5,2) media_gen,
coalesce(t1.mod_lectura_critica::numeric,0) med_lec,
coalesce(t1.mod_comunica_escrita_punt::numeric,0) med_com,
coalesce(t1.mod_razona_cuantitativo_punt::numeric,0) med_raz,
coalesce(t1.mod_ingles_punt::numeric,0) med_ing,
coalesce(t1.mod_comp_ciudadanas_punt::numeric,0) med_ciud
from 
saberpro_final t1 join dim_estudiantes t2 on t1.estuconsecutivo=t2.estuconsecutivo
join dim_instituciones t3 on t1.inst_cod_institucion=t3.inst_cod_institucion 
/* 
--porque hay programas con el mismo codigo que se repiten (hay necesidad de hacer una limpieza para este error
-- Por eso se producen mas registros que el numero total de estudiantes
*/
--
join dim_programas t4 on
concat(t1.estu_prac_id_prgrm_academico,t1.estu_prgm_academico,t1.estu_nivel_prgm_academico,t1.inst_prgm_metodologia,t1.estu_nucleo_pregrado,t1.estu_cod_grupo_ref,t1.estu_grupo_referencia,t1.estu_area_conoc,t1.area_grupo_referencia,t1.inst_prgm_acreditado)=
concat(t4.prgrm_prac_id_academico,t4.prgm_academico,t4.prgrm_nivel_academico,t4.prgm_metodologia,t4.prgrm_nucleo_pregrado,t4.prgrm_cod_grupo_ref,t4.prgrm_grupo_referencia,t4.prgrm_area_conoc,t4.prgrm_area_grupo_referencia,t4.prgm_acreditado)

/*
 join dim_programas t4 on
concat(t1.estu_prac_id_prgrm_academico,t1.estu_prgm_academico,t1.estu_nivel_prgm_academico,t1.inst_prgm_metodologia,t1.estu_nucleo_pregrado,t1.estu_cod_grupo_ref,t1.estu_grupo_referencia,t1.estu_area_conoc,t1.area_grupo_referencia,t1.inst_prgm_acreditado,t1.inst_prgm_municipio)=
concat(t4.prgrm_prac_id_academico,t4.prgm_academico,t4.prgrm_nivel_academico,t4.prgm_metodologia,t4.prgrm_nucleo_pregrado,t4.prgrm_cod_grupo_ref,t4.prgrm_grupo_referencia,t4.prgrm_area_conoc,t4.prgrm_area_grupo_referencia,t4.prgm_acreditado,t4.prgm_municipio)

 -- con el municipio da el mismo resultado INSERT 0 720856
*/
 /* 
join dim_programas t4 on t1.estu_prac_id_prgrm_academico=t4.prgrm_prac_id_academico and t1.estu_prgm_academico=t4.prgm_academico
 and t1.inst_cod_institucion=t3.inst_cod_institucion 
 
 da aproximadamente 723.000 estudiantes, 3000 mas de los que presentaron
 */
join dim_lugares t5 on t1.inst_prgm_municipio=t5.inst_prgm_municipio and t1.inst_prgm_dpto=t5.inst_prgm_dpto
join dim_pruebas t6 on t1.estuconsecutivo=t6.cod_estuconsecutivo 
join dim_tiempo t7 on t1.prueba= t7.prueba 
order by 1);
rollback;
--INSERT 0 720856
--Query returned successfully in 1 min 42 secs.
commit;
-- =====================================================================================
-- CONSULTAS OLAP (CUBOS)
---------------------------------------------------------------------------------------
-- Visualizar el numero de estudiantes y la media general de la Universidad de Nariño
-- por prueba ordenados por tiempo
select 
inst_nombre_institucion as institucion,
ano_prue as prueba,
sum(numero_estu) as numero_estudiantes,
round(avg(media_general),2) as media_general
from
dim_instituciones join fact_saberpro using(id_institucion) join dim_tiempo using(id_tiempo)
where 
inst_nombre_institucion like '%UNIVERSIDAD%DE%NARI_O%' 
group by 1,2
order by 2;

