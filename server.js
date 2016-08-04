var socket  = require( './public/node_modules/socket.io' );
var express = require('./public/node_modules/express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function () {
    console.log('Server listening at port %d', port);
});

var uids = {};
var uinitial = {};
var rooms = {};
var role_id = {};

io.on('connection', function (socket) {

    console.log('Connected: ' + Object.keys(io.sockets.connected).length + ' users.');

    socket.on( 'login_new_user', function (data) {
        io.sockets.emit('login_new_user', {
            login_new_user: data.login_new_user
        });
    });

    socket.on('info_connected_user', function (data) {
        console.log(data);
        socket.uid = data.uid;
        socket.uinitial = data.uinitial;
        socket.role_id = data.role_id;
    });
    
    socket.on('join_room', function (data) {
        console.log(data.user_room);
        socket.room = data.user_room;
        socket.join(data.user_room);
        // echo to client they've connected
        socket.emit('updatechat', 'you have connected to' + data.user_room);
        // echo to room 1 that a person has connected to their room
        socket.broadcast.to(1).emit('updatechat', 'SERVER' + socket.uinitial + ' has connected to this room');
    });

    socket.on( 'new_count_message', function( data ) {
        console.log('new_count_message:' + data.new_count_message);
        io.sockets.emit( 'new_count_message', {
            new_count_message: data.new_count_message

        });
    });

    socket.on( 'update_count_message', function( data ) {
        console.log('update_count_message:' + data.update_count_message);
        io.sockets.emit( 'update_count_message', {
            update_count_message: data.update_count_message
        });
    });

    socket.on( 'new_message', function( data ) {
        console.log(data);
        io.sockets.in(socket.room).emit( 'new_message', {
            message: data.message,
            user_id: data.user_id,
            created_at: data.created_at,
            user_name: data.user_name
        });
    });

    socket.on('disconnect', function () {
        console.log('Disconnect: ' + Object.keys(io.sockets.connected).length + ' users.');
    });


});