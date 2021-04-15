window.onload = function () {
  let cnv = document.getElementById('canvas');
  const cnvWidth = 250;
  const cnvHeight = 250;
  let players = ['player1', 'player2'];
  let odd = [0, 0];
  let turns = [
    [' ', ' ', ' '],
    [' ', ' ', ' '],
    [' ', ' ', ' '],
  ];
  let winCondition = [
    [
      [0, 0],
      [0, 1],
      [0, 2],
    ],
    [
      [1, 0],
      [1, 1],
      [1, 2],
    ],
    [
      [2, 0],
      [2, 1],
      [2, 2],
    ],
    [
      [0, 0],
      [1, 0],
      [2, 0],
    ],
    [
      [0, 1],
      [1, 1],
      [2, 1],
    ],
    [
      [0, 2],
      [1, 2],
      [2, 2],
    ],
    [
      [0, 0],
      [1, 1],
      [2, 2],
    ],
    [
      [0, 2],
      [1, 1],
      [2, 0],
    ],
  ];
  let oSize = cnvWidth / 12;
  let yach = cnvWidth / 3;
  let xSize = cnvWidth / 6;
  cnv.width = cnvWidth;
  cnv.height = cnvHeight;
  let ctx = cnv.getContext('2d');
  let turn = 1;
  let plr = 0;
  startGame(ctx, cnvWidth, cnvHeight);
  document.getElementById('reset').addEventListener('click', () => {
    canvas.width = canvas.width;
    turns = [
      [' ', ' ', ' '],
      [' ', ' ', ' '],
      [' ', ' ', ' '],
    ];
    turn = 1;
    odd = [0, 0];
    document.getElementById('player1').innerText = odd[0];
    document.getElementById('player2').innerText = odd[1];
    setOrder();
    ctx.beginPath();
    ctx.lineWidth = 3;
    ctx.moveTo(cnvWidth / 3, 0);
    ctx.lineTo(cnvWidth / 3, cnvHeight);
    ctx.moveTo((cnvWidth / 3) * 2, 0);
    ctx.lineTo((cnvWidth / 3) * 2, cnvHeight);
    ctx.moveTo(0, cnvHeight / 3);
    ctx.lineTo(cnvWidth, cnvHeight / 3);
    ctx.moveTo(0, (cnvHeight / 3) * 2);
    ctx.lineTo(cnvWidth, (cnvHeight / 3) * 2);
    ctx.stroke();
  });
  document
    .getElementById('newraund')
    .addEventListener('click', () => startGame());
  cnv.addEventListener('click', (e) => newTurn(e, ctx, oSize, yach, xSize));

  function startGame() {
    canvas.width = canvas.width;
    turns = [
      [' ', ' ', ' '],
      [' ', ' ', ' '],
      [' ', ' ', ' '],
    ];
    turn = 1;
    setOrder();
    ctx.beginPath();
    ctx.lineWidth = 3;
    ctx.moveTo(cnvWidth / 3, 0);
    ctx.lineTo(cnvWidth / 3, cnvHeight);
    ctx.moveTo((cnvWidth / 3) * 2, 0);
    ctx.lineTo((cnvWidth / 3) * 2, cnvHeight);
    ctx.moveTo(0, cnvHeight / 3);
    ctx.lineTo(cnvWidth, cnvHeight / 3);
    ctx.moveTo(0, (cnvHeight / 3) * 2);
    ctx.lineTo(cnvWidth, (cnvHeight / 3) * 2);
    ctx.stroke();
  }

  function setOrder() {
    if (plr == 0) {
      document.getElementById('plrnow').innerText = 'первый';
    } else {
      document.getElementById('plrnow').innerText = 'второй';
    }
    if (turn == 0) {
      document.getElementById('sign').innerText = 'O';
    } else {
      document.getElementById('sign').innerText = 'X';
    }
  }

  function newTurn(e, ctx, oSize, yach, xSize) {
    let change = false;
    if (turn == 0) {
      let turnO = drawO(e, ctx, oSize, yach);
      if (turnO == true) {
        turn = 1;
        change = true;
      }
    } else {
      let turnO = drawX(e, ctx, xSize, yach);
      if (turnO == true) {
        turn = 0;
        change = true;
      }
    }
    let status = '';
    for (key of winCondition) {
      if (
        turns[key[0][0]][key[0][1]] === turns[key[1][0]][key[1][1]] &&
        turns[key[1][0]][key[1][1]] === turns[key[2][0]][key[2][1]] &&
        turns[key[1][0]][key[1][1]] != ' '
      ) {
        status = 'Победа';
        break;
      }
    }
    if (status == 'Победа') {
      odd[plr] += 1;
      document.getElementById(players[plr]).innerText = odd[plr];
      ctx.fillStyle = 'rgba(255,255,255,.7)';
      ctx.fillRect(0, 0, cnvWidth, cnvWidth);
      ctx.font = '25px Arial';
      if (plr == 0) {
        ctx.strokeText('Победил первый', 0, cnvWidth / 2);
      } else {
        ctx.strokeText('Победил второй', 0, cnvWidth / 2);
      }
    } else if (change == true) {
      if (plr == 1) {
        plr = 0;
      } else {
        plr = 1;
      }
      setOrder();
    }
  }

  function getPositionX(e, yach) {
    if (e.offsetX < yach) {
      positionX = yach / 2;
      idx = 0;
    } else if (e.offsetX < yach * 2) {
      positionX = yach * 2 - yach / 2;
      idx = 1;
    } else {
      positionX = yach * 3 - yach / 2;
      idx = 2;
    }
    return [positionX, idx];
  }

  function getPositionY(e, yach) {
    if (e.offsetY < yach) {
      positionY = yach / 2;
      idx = 0;
    } else if (e.offsetY < yach * 2) {
      positionY = yach * 2 - yach / 2;
      idx = 1;
    } else {
      positionY = yach * 3 - yach / 2;
      idx = 2;
    }
    return [positionY, idx];
  }

  function drawO(e, ctx, oSize, yach) {
    [positionX, x] = getPositionX(e, yach);
    [positionY, y] = getPositionY(e, yach);
    if (turns[y][x] === ' ') {
      ctx.beginPath();
      ctx.arc(positionX, positionY, oSize, 0, 2 * Math.PI);
      ctx.stroke();
      turns[y][x] = 'O';
      return true;
    } else {
      return false;
    }
  }
  function drawX(e, ctx, xSize, yach) {
    [positionX, x] = getPositionX(e, yach);
    [positionY, y] = getPositionY(e, yach);
    positionY -= xSize / Math.sqrt(2) / 2;
    positionX -= xSize / Math.sqrt(2) / 2;
    if (turns[y][x] === ' ') {
      ctx.beginPath();
      ctx.moveTo(positionX, positionY);
      ctx.lineTo(positionX + xSize, positionY + xSize);
      ctx.moveTo(positionX, positionY + xSize);
      ctx.lineTo(positionX + xSize, positionY);
      ctx.stroke();
      turns[y][x] = 'X';
      return true;
    } else {
      return false;
    }
  }
};
