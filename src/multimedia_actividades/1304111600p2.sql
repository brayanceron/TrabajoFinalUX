-- DIMENSION PROGRAMAS
-- delete from dim_programas;
insert into dim_programas(
prgrm_snies,prgm_academico,prgrm_nivel_academico,prgm_metodologia,prgrm_nucleo_pregrado,prgm_acreditado,prgm_municipio)
(select distinct 
estu_snies_prgmacademico,
estu_prgm_academico,
--translate(estu_prgm_academico,'áéíóúÁÉÍÓÚÜ','aeiouAEIOUU') as estu_prgm_academico,
estu_nivel_prgm_academico,
inst_prgm_metodologia,
estu_nucleo_pregrado,
--translate(estu_nucleo_pregrado,'áéíóúÁÉÍÓÚÜ','aeiouAEIOUU') as estu_nucleo_pregrado,
inst_prgm_acreditado,
inst_prgm_municipio
from saberpro_final);













------------------------------------------------------------------------------------------------------------------------------
--17. Actualizar el atributo inst_prgm_municipio a partir del atributo municipio_programa
--de la tabla programas_ies en el caso de que sean iguales y sino actualizar con el
--atributo  estu_prgm_municipio
--CREATE INDEX idx_municipio_programa  ON programas_ies (municipio_programa);
--CREATE INDEX idx_codigo_snies  ON programas_ies (codigo_snies);
--CREATE INDEX idx_codigo_inst  ON programas_ies (codigo_inst);

begin;
update saberpro_transformado set inst_prgm_municipio=case
when
(select municipio_programa from programas_ies where codigo_snies=estu_snies_prgmacademico and
 codigo_inst=inst_cod_institucion limit 1) is null then  estu_prgm_municipio
else 
(select municipio_programa from programas_ies where codigo_snies=estu_snies_prgmacademico and
 codigo_inst=inst_cod_institucion limit 1)
end;
--rollback;
commit;
/*
UPDATE 349908
Consulta retornó exitosamente en 50 secs 47 msec.
*/

--select distinct inst_prgm_municipio from saberpro_transformado where inst_prgm_municipio is null;
--select inst_prgm_municipio,estu_mcpio_presentacion from saberpro_transformado limit 400;
------------------------------------------------------------------------------------------------------------------------------
--18. Actualizar los nulos del atributo inst_prgm_municipio (si los hay) con el valor del
--atributo estu_prgm_municipio
begin;
update saberpro_transformado set inst_prgm_municipio=estu_prgm_municipio
where inst_prgm_municipio is null;
--rollback;
commit;
/*
UPDATE 0
Consulta retornó exitosamente en 1 secs 680 msec.
*/

--select distinct inst_prgm_municipio from saberpro_transformado where inst_prgm_municipio is null;

----------------------------------------------------------------------------------------------------------------------
--19. Crear el atributo inst_prgm_dpto de tipo text
alter table saberpro_transformado add inst_prgm_dpto text;
 --alter table saberpro_transformado drop column inst_prgm_dpto;
/*
ALTER TABLE
Consulta retornó exitosamente en 1 secs 31 msec.
*/

----------------------------------------------------------------------------------------------------------------------
--20. Actualizar el atributo inst_prgm_dpto a partir del atributo estu_prgm_departamento
begin;
update saberpro_transformado set inst_prgm_dpto=estu_prgm_departamento;
--rollback;
commit;
/*
UPDATE 349908
Consulta retornó exitosamente en 55 secs 849 msec.
*/

--select distinct inst_prgm_dpto from saberpro_transformado
--select distinct inst_prgm_dpto from saberpro_transformado where inst_prgm_dpto is null
----------------------------------------------------------------------------------------------------------------------
--21. Crear el atributo inst_prgm_zonageo de tipo text
alter table saberpro_transformado add inst_prgm_zonageo text;
/*
ALTER TABLE
Consulta retornó exitosamente en 43 msec.
*/
----------------------------------------------------------------------------------------------------------------------
--22. Actualizar el atributo inst_prgm_zonageo de acuerdo a la siguiente tabla del MEN
 /*
---------------------------------------------------------------------------------------
 Zonas 			|	Departamentos
---------------------------------------------------------------------------------------
ATLANTICA 		|	Atlántico, Bolívar, Cesar, Córdoba, Guajira, Magdalena, San Andrés,
				|	Providencia y Santa Catalina y Sucre.
---------------------------------------------------------------------------------------
ORINOQUIA 		|	Amazonas, Arauca, Casanare, Guainía, Guaviare,Putumayo,Vaupes y
				|	Vichada
---------------------------------------------------------------------------------------
ORIENTAL 		|	Boyacá, Cundinamarca, Norte Santander, Santander y Meta
---------------------------------------------------------------------------------------
CENTRAL 		|	Caldas, Risaralda, Quindío, Huila, Tolima y Caquetá
---------------------------------------------------------------------------------------
PACÍFICA 		|	Cauca, Chocó, Nariño y Valle del Cauca.
---------------------------------------------------------------------------------------
BOGOTÁ 			|	Distrito Capital de Bogotá
---------------------------------------------------------------------------------------
ANTIOQUIA 		|	Antioquia
---------------------------------------------------------------------------------------
 */
begin;
update saberpro_transformado set inst_prgm_zonageo=case
when estu_prgm_departamento in ('ATLANTICO','BOLIVAR','CESAR','CORDOBA','LA GUAJIRA','MAGDALENA','SAN ANDRES','SUCRE') then 'ATLANTICA'
when estu_prgm_departamento in ('AMAZONAS','ARAUCA','CASANARE','GUAINIA','GUAVIARE','PUTUMAYO','VAUPES','VICHADA') then 'ORINOQUIA'
when estu_prgm_departamento in ('BOYACA','CUNDINAMARCA','NORTE SANTANDER','SANTANDER','META') then 'ORIENTAL'
when estu_prgm_departamento in ('CALDAS','RISARALDA','QUINDIO','HUILA','TOLIMA','CAQUETA','VAUPES','VICHADA') then 'CENTRAL'
when estu_prgm_departamento in ('CAUCA','CHOCO','NARIÑO','VALLE','META') then 'PACIFICA'
when estu_prgm_departamento in ('BOGOTA','BOGOTÁ','BOGOTA D.C.') then 'BOGOTA'
when estu_prgm_departamento in ('ANTIOQUIA') then 'ANTIOQUIA'
else inst_prgm_zonageo
end;
--rollback;
commit;
/*
UPDATE 349908
Consulta retornó exitosamente en 33 secs 874 msec.
*/

--select distinct estu_inst_departamento from saberpro_transformado
--select distinct inst_prgm_zonageo from saberpro_transformado
------------------------------------------------------------------------------------------------------------------------------------------------






















--21. Actualizar el atributo estu_snies_prgmacademico con los valores correspondientes a los
--codigos de los programas de la tabla programas_ies, de acuerdo al código al codigo snies,nombre del programa y a el codigo de la institucion
begin;
update saberpro_transformado as t1 set estu_snies_prgmacademico= 
(select codigo_snies from programas_ies 
where codigo_snies=t1.estu_snies_prgmacademico and 
translate(nombre_programa,'áéíóúÁÉÍÓÚÜ','aeiouAEIOUU')=translate(t1.estu_prgm_academico,'áéíóúÁÉÍÓÚÜ','aeiouAEIOUU') and
 codigo_inst=t1.inst_cod_institucion);

--rollback;
commit;


--22. Crear el atributo estu_reside_nomdpto de tipo text
--23. Actualizar el atributo estu_reside_nomdpto con los valores correspondientes a los
--nombres de los departamentos de la tabla del DANE, de acuerdo al código de los dos
--primeros dígitos del atributo estu_reside_codmpios