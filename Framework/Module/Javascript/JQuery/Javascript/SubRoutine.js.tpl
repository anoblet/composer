$.ajax ({ url: "index.php", data: ({ Type: "Function", Target: { Class:
encodeURI("
<?=$this->Class?>
"), Function: encodeURI("
<?=$this->Function?>
") }, }), success: function(msg) { $("#AJAXResponse").append(msg); } });
}
