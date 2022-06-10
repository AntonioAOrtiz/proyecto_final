// Autoinicio de materialize
M.AutoInit();
      //Hover para mostrar las diferentes opciones cuando pasas con el cursor sobre nuevo o listado en el header.
      $('.dropdown-trigger').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false, 
        hover: true,
        belowOrigin: true,
        alignment: 'left'
      });
