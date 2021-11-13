create view v_eco_org_tax
            (id_eco_org, name_org, inn, kpp, adress, fam, im, ot, vid, tel, email, viruch, price, id_edo, okpo, reg,
             kod, site, egaic, gln, okved, okveds, geo_lat, geo_lon, ch_okved, ch_lic_oth, ch_lic_vibros, ch_lic_met,
             adress_load, ch_nvos, lat, lon)
as
SELECT t.id_eco_org,
       t.name_org,
       t.inn,
       t.kpp,
       t.adress,
       t.fam,
       t.im,
       t.ot,
       t.vid,
       t.tel,
       t.email,
       t.viruch,
       t.price,
       t.id_edo,
       t.okpo,
       t.reg,
       t.kod,
       t.site,
       t.egaic,
       t.gln,
       t.okved,
       t.okveds,
       t.geo_lat,
       t.geo_lon,
       t.ch_okved,
       t.ch_lic_oth,
       t.ch_lic_vibros,
       t.ch_lic_met,
       t.adress_load,
       t.ch_nvos,
       t.lat,
       t.lon
FROM (SELECT c.id_eco_org,
             c.name_org,
             c.inn,
             c.kpp,
             c.adress,
             c.fam,
             c.im,
             c.ot,
             c.vid,
             c.tel,
             c.email,
             c.viruch,
             c.price,
             c.id_edo,
             c.okpo,
             c.reg,
             c.kod,
             c.site,
             c.egaic,
             c.gln,
             c.okved,
             c.okveds,
             c.geo_lat,
             c.geo_lon,
             c.ch_okved,
             c.ch_lic_oth,
             c.ch_lic_vibros,
             c.ch_lic_met,
             c.adress_load,
             c.ch_nvos,
             c.geo_lat::numeric AS lat,
             c.geo_lon::numeric AS lon
      FROM eco_org_tax c
      WHERE c.ch_nvos = 1
      LIMIT 500) t
UNION
SELECT t.id_eco_org,
       t.name_org,
       t.inn,
       t.kpp,
       t.adress,
       t.fam,
       t.im,
       t.ot,
       t.vid,
       t.tel,
       t.email,
       t.viruch,
       t.price,
       t.id_edo,
       t.okpo,
       t.reg,
       t.kod,
       t.site,
       t.egaic,
       t.gln,
       t.okved,
       t.okveds,
       t.geo_lat,
       t.geo_lon,
       t.ch_okved,
       t.ch_lic_oth,
       t.ch_lic_vibros,
       t.ch_lic_met,
       t.adress_load,
       t.ch_nvos,
       t.lat,
       t.lon
FROM (SELECT c.id_eco_org,
             c.name_org,
             c.inn,
             c.kpp,
             c.adress,
             c.fam,
             c.im,
             c.ot,
             c.vid,
             c.tel,
             c.email,
             c.viruch,
             c.price,
             c.id_edo,
             c.okpo,
             c.reg,
             c.kod,
             c.site,
             c.egaic,
             c.gln,
             c.okved,
             c.okveds,
             c.geo_lat,
             c.geo_lon,
             c.ch_okved,
             c.ch_lic_oth,
             c.ch_lic_vibros,
             c.ch_lic_met,
             c.adress_load,
             c.ch_nvos,
             c.geo_lat::numeric AS lat,
             c.geo_lon::numeric AS lon
      FROM eco_org_tax c
      WHERE c.ch_okved = 1
         OR c.ch_lic_met = 1
         OR c.ch_lic_oth = 1
         OR c.ch_lic_vibros = 1
      LIMIT 500) t
UNION
SELECT t.id_eco_org,
       t.name_org,
       t.inn,
       t.kpp,
       t.adress,
       t.fam,
       t.im,
       t.ot,
       t.vid,
       t.tel,
       t.email,
       t.viruch,
       t.price,
       t.id_edo,
       t.okpo,
       t.reg,
       t.kod,
       t.site,
       t.egaic,
       t.gln,
       t.okved,
       t.okveds,
       t.geo_lat,
       t.geo_lon,
       t.ch_okved,
       t.ch_lic_oth,
       t.ch_lic_vibros,
       t.ch_lic_met,
       t.adress_load,
       t.ch_nvos,
       t.lat,
       t.lon
FROM (SELECT c.id_eco_org,
             c.name_org,
             c.inn,
             c.kpp,
             c.adress,
             c.fam,
             c.im,
             c.ot,
             c.vid,
             c.tel,
             c.email,
             c.viruch,
             c.price,
             c.id_edo,
             c.okpo,
             c.reg,
             c.kod,
             c.site,
             c.egaic,
             c.gln,
             c.okved,
             c.okveds,
             c.geo_lat,
             c.geo_lon,
             c.ch_okved,
             c.ch_lic_oth,
             c.ch_lic_vibros,
             c.ch_lic_met,
             c.adress_load,
             c.ch_nvos,
             c.geo_lat::numeric AS lat,
             c.geo_lon::numeric AS lon
      FROM eco_org_tax c
      WHERE c.ch_okved = 0 AND c.ch_lic_met = 0
         OR c.ch_lic_oth = 0
         OR c.ch_lic_vibros = 0 AND c.ch_nvos = 0
      LIMIT 500) t;

alter table v_eco_org_tax
    owner to postgres;

create view v_eco_org_category
            (id_eco_org, name_org, inn, kpp, adress, fam, im, ot, vid, tel, email, viruch, price, id_edo, okpo, reg,
             kod, site, egaic, gln, okved, okveds, geo_lat, geo_lon, ch_okved, ch_lic_oth, ch_lic_vibros, ch_lic_met,
             adress_load, ch_nvos, lat, lon)
as
SELECT t.id_eco_org,
       t.name_org,
       t.inn,
       t.kpp,
       t.adress,
       t.fam,
       t.im,
       t.ot,
       t.vid,
       t.tel,
       t.email,
       t.viruch,
       t.price,
       t.id_edo,
       t.okpo,
       t.reg,
       t.kod,
       t.site,
       t.egaic,
       t.gln,
       t.okved,
       t.okveds,
       t.geo_lat,
       t.geo_lon,
       t.ch_okved,
       t.ch_lic_oth,
       t.ch_lic_vibros,
       t.ch_lic_met,
       t.adress_load,
       t.ch_nvos,
       t.geo_lat::numeric AS lat,
       t.geo_lon::numeric AS lon
FROM eco_org_tax t;

alter table v_eco_org_category
    owner to postgres;

