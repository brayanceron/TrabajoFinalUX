
/*instancia_de(objeto,clase).*/



/*subclase_de(clase1,clase2).*/

subclase_de(Ciprinodontiforme,Peces).
subclase_de(Anabántidos,Peces).
subclase_de(Ciclidos,Peces).
subclase_de(Poecílidos,Ciprinodontiforme).

subclase_de(Gambusia_affinis,Poecílidos).
subclase_de(Gambusia_Punctata,Poecílidos).

subclase_de(Pez_joya,Ciclidos).

subclase_de(Luchadores_de_Siam,Anabántidos).
subclase_de(Perca_trepadora,Anabántidos).



/*tiene_propiedad(clase,propiedad,clase2).*/
tiene_propiedad(Peces,habitan_en,Rios).

tiene_propiedad(Gambusia_affinis,es_de_color,Gris ).
tiene_propiedad(Gambusia_affinis,tiene_rayas,Verdes).

tiene_propiedad(Gambusia_Punctata,tiene,Manchas).

tiene_propiedad(Gambusia_Punctata,tiene,Manchas).

tiene_propiedad(Poecílidos,vive_en,América_del_sur).
tiene_propiedad(Poecílidos,tiene_genero,Macho).
tiene_propiedad(Poecílidos,tiene_genero,Hembra).

tiene_propiedad(Macho,tiene,Gonopodio).
tiene_propiedad(Hembra,3cm_mas_grande,Macho).
tiene_propiedad(Macho,3cm_mas_pequeno,Hembra).

tiene_propiedad(Ciprinodontiforme,tiene,Dientes_puntiagudos).
tiene_propiedad(Ciprinodontiforme,tiene,Boca_pequena).
tiene_propiedad(Anabántidos,tiene,Dientes_puntiagudos).

tiene_propiedad(Anabántidos,tiene,Canales_laberínticos).
tiene_propiedad(Anabántidos,tamano,Medio).

tiene_propiedad(Luchadores_de_Siam,vive_en,Asia).
tiene_propiedad(Luchadores_de_Siam,es_de_color,Azul).
tiene_propiedad(Luchadores_de_Siam,tiene_rayas,Rojas).

tiene_propiedad(Perca_trepadora,mide,25cm).
No(tiene_propiedad(Perca_trepadora,tiene_rayas,Rojas)).



tiene_propiedad(Ciclidos,tiene,Cola_redondeada).
tiene_propiedad(Ciclidos,tiene,Boca_pequena).


tiene_propiedad(Pez_joya,vive_en,África).
tiene_propiedad(Pez_joya,tiene_manchas,Negras).
tiene_propiedad(Pez_joya,es_de_color,Rojo).



es(Clase, Obj):- instancia_de(Obj,Clase).
es(Clase, Obj):- instancia_de(Obj,Clasep),subc(Clasep,Clase).
subc(C1,C2):- subclase_de(C1,C2).
subc(C1,C2):- subclase_de(C1,C3),subc(C3,C2).




